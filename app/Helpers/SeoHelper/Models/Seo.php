<?php

namespace App\Helpers\SeoHelper\Models;

use App\Traits\HasDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Helpers\SeoHelper\Models\Seo
 *
 * @property int $id
 * @property int $seo_id
 * @property string $seo_type
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $tags
 * @property int $indexing
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Detail[] $details
 * @property-read int|null $details_count
 * @property-read Model|\Eloquent $seo
 * @method static \Illuminate\Database\Eloquent\Builder|Seo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereIndexing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereSeoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereSeoType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Seo extends Model
{
    use HasFactory, HasDetails;

    protected $guarded = ['id'];

    function detailAttributes(): array
    {
        return [];
    }

    public function seo()
    {
        return $this->morphTo();
    }
}
