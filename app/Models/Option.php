<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Option
 *
 * @property int $id
 * @property int $attribute_id
 * @property string $title
 * @property string $body
 * @property string $code
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attribute|null $attribute
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Optionable[] $optionable
 * @property-read int|null $optionable_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variation[] $variations
 * @property-read int|null $variations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Option extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\OptionFactory::new();
//    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'model','optionable')
            ->using(Optionable::class);
    }

    public function variations()
    {
        return $this->morphedByMany(Variation::class, 'model','optionable')
            ->using(Optionable::class);
    }

    public function optionable()
    {
        return $this->hasMany(Optionable::class);
    }
}
