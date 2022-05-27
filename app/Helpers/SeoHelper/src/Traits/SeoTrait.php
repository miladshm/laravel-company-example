<?php

namespace App\Helpers\SeoHelper\src\Traits;

use App\Helpers\SeoHelper\Models\Seo;

trait SeoTrait
{

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seo')->withDefault();
    }
}
