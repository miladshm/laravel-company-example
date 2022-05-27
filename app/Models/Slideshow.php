<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Slideshow extends Model implements Sortable
{
    use HasFactory;
    use SoftDeletes;
    use SortableTrait;

    protected $guarded = ['id'];

    protected $casts = ['photos' => AsCollection::class];

    public static function getSizes(): array
    {
        return [
            'xl' => 'خیلی بزرگ',
            'desktop' => 'اصلی',
            'tablet' => 'تبلت',
            'mobile' => 'موبایل',
            'xl_webp' => 'خیلی بزرگ webp',
            'desktop_webp' => 'اصلی webp',
            'tablet_webp' => 'تبلت webp',
            'mobile_webp' => 'موبایل webp',
        ];
    }

}
