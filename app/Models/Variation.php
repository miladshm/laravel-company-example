<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Variation
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $title
 * @property int $is_default
 * @property int $is_available
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor[] $factors
 * @property-read int|null $factors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Option[] $options
 * @property-read int|null $options_count
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Variation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Variation extends Model
{
    use HasFactory;

    protected $fillable = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\VariationFactory::new();
//    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function options()
    {
        return $this->morphToMany(Option::class, 'model', 'optionable')
            ->using(Optionable::class);
    }

    public function factors()
    {
        return $this->morphToMany(Factor::class,'item', 'factor_product');
    }
}
