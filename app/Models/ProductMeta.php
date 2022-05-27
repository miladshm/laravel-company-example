<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\ProductMeta
 *
 * @property string $item_type
 * @property int $item_id
 * @property string|null $price
 * @property string|null $sale_price
 * @property string|null $fixed_price
 * @property string|null $valid_until
 * @property int $stock
 * @property string|null $sku
 * @property int|null $weight
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $item
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereFixedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereValidUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereWeight($value)
 * @mixin \Eloquent
 */
class ProductMeta extends Model
{

    protected $guarded = [];

    public function item()
    {
        return $this->morphTo();
    }
}
