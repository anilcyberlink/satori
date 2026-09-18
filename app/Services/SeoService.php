<?php

namespace App\Services;

use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SeoService
{
    public function save(Model $model, Request $request): ?SeoMeta
    {
        if (!$request->has('seo')) {
            return null;
        }
        $seoData = $request->seo ?? [];
        $actualSeoFields = [
            'meta_title',
            'meta_description',
            'og_title',
            'og_description',
            'og_image_alt',
            'canonical_url',
            'schema_type',
            'schema_data',
            'focus_keyword',
            'change_frequency'
        ];
        $hasSeoData = false;
        foreach ($actualSeoFields as $field) {
            if (isset($seoData[$field]) && trim((string) $seoData[$field]) !== '') {
                $hasSeoData = true;
                break;
            }
        }
        if ($request->hasFile('seo_og_image')) {
            $hasSeoData = true;
        }
        if (!$hasSeoData) {
            $model->seo()->delete();
            return null;
        }
        $index = isset($seoData['index']) && $seoData['index'] == 1;
        $follow = isset($seoData['follow']) && $seoData['follow'] == 1;
        $seoData['robots'] = ($index ? 'index' : 'noindex') . ',' . ($follow ? 'follow' : 'nofollow');
        unset($seoData['index'], $seoData['follow']);
        if ($request->hasFile('seo_og_image')) {
            $ogFile = $request->file('seo_og_image');
            $ogName = Str::slug(pathinfo($ogFile->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . Str::random(5) . '.webp';
            $destination = public_path('uploads/seo');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            Image::make($ogFile->getRealPath())->encode('webp', 85)->save($destination . '/' . $ogName);
            $seo = $model->seo;
            if ($seo && $seo->og_image) {
                $oldImage = public_path('uploads/seo/' . $seo->og_image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $seoData['og_image'] = $ogName;
        }
        if (!empty($seoData['schema_data'])) {
            $cleaned = $this->cleanSchemaJson($seoData['schema_data']);
            if ($cleaned !== null) {
                $seoData['schema_data'] = $cleaned;
            } else {
                unset($seoData['schema_data']);
                session()->flash('warning', 'Invalid schema JSON. Not saved.');
            }
        }
        return $model->seo()->updateOrCreate([], $seoData);
    }

    private function cleanSchemaJson($schemaData)
    {
        if (empty($schemaData)) {
            return null;
        }
        if (is_array($schemaData)) {
            return $schemaData;
        }
        $json = trim($schemaData);
        $json = preg_replace('/```json\s*/i', '', $json);
        $json = preg_replace('/```\s*/', '', $json);
        $json = preg_replace('/"\.\.\."\s*:\s*".*?",?/', '', $json);
        $json = preg_replace('/,\s*([}\]])/', '$1', $json);
        $json = str_replace(["\r", "\n", "\t"], '', $json);
        if (!str_starts_with($json, '{')) {
            $json = '{' . $json;
        }
        if (!str_ends_with($json, '}')) {
            $json .= '}';
        }
        $decoded = json_decode($json, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
    }
}
