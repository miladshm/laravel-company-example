<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\FactorProduct
 *
 * @property int $id
 * @property int $factor_id
 * @property int $product_id
 * @property string $item_type
 * @property int $item_id
 * @property string $price
 * @property int $count
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Factor|null $factor
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereFactorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactorProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FactorProduct extends Pivot
{
    use HasFactory;

    protected $guarded = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\FactorProductFactory::new();
//    }

    public function factor()
    {
        return $this->belongsTo(Factor::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
