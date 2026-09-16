<?php

namespace App\Models\Traits;

use App\Models\SeoMeta;
/**
 * @mixin Model
*/
trait HasSeo
{
    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
    protected static function bootHasSeo()
    {
        static::deleting(function ($model) {
            $model->seo()->delete();
        });
    }
}
