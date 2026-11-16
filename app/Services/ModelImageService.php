<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ModelImageService
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path('uploads/original');

        if (!file_exists($this->uploadPath)) {
            mkdir($this->uploadPath, 0755, true);
        }
    }

    public function save(Model $model, array $images)
    {
        foreach ($images as $image) {
            if (!$image instanceof UploadedFile) {
                continue;
            }

            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())
                ->encode('webp', 85)
                ->save($this->uploadPath . '/' . $name);

            $model->multiBanners()->create([
                'title' => $originalName,
                'image' => $name,
                'status' => 1,
            ]);
        }
    }
    public function delete(Model $image)
    {
        $path = $this->uploadPath . '/' . $image->image;
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();
    }
}
