<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Factor
 *
 * @property int $id
 * @property int $user_id
 * @property string $payment_price
 * @property string $amount
 * @property string $transaction_id
 * @property string $ref_id
 * @property string $tracking_code
 * @property string $status
 * @property int $seen
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\SendFactor|null $send_factor
 * @property-read User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variation[] $variations
 * @property-read int|null $variations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Factor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor wherePaymentPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereSeen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereUserId($value)
 * @mixin \Eloquent
 */
class Factor extends Model
{
    use HasFactory;

    protected $fillable = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\FactorFactory::new();
//    }

    public function send_factor()
    {
        return $this->hasOne(SendFactor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function variations()
    {
        return $this->morphedByMany(Variation::class, 'item', 'factor_product');
    }
}
