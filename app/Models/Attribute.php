<?php

namespace App\Models;

use App\Helpers\CacheHelper\Traits\CacheTrait;
use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\Models\Attribute
 *
 * @property int $id
 * @property string $title
 * @property int $position
 * @property int $use_as_filter
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Option[] $options
 * @property-read int|null $options_count
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute newQuery()
 * @method static \Illuminate\Database\Query\Builder|Attribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attribute whereUseAsFilter($value)
 * @method static \Illuminate\Database\Query\Builder|Attribute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Attribute withoutTrashed()
 * @mixin \Eloquent
 */
class Attribute extends Model implements Sortable
{
    use HasFactory,
        SoftDeletes,
        CacheTrait,
        SortableTrait,
        LogTrait;
    protected $guarded = [];

    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true,
    ];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\AttributeFactory::new();
//    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
