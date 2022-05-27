<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Detail
 *
 * @property int $id
 * @property int $item_id
 * @property string $item_type
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $items
 * @method static \Illuminate\Database\Eloquent\Builder|Detail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail newQuery()
 * @method static \Illuminate\Database\Query\Builder|Detail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail query()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|Detail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Detail withoutTrashed()
 * @mixin \Eloquent
 */
class Detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'value'];

    public function items()
    {
        return $this->morphTo();
    }
}
