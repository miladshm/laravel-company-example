<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\SendFactor
 *
 * @property int $id
 * @property int $factor_id
 * @property int $send_method_id
 * @property string $send_price
 * @property string $status
 * @property string $address
 * @property string|null $post_tracking
 * @property string|null $stocked_at
 * @property string|null $posted_at
 * @property string|null $canceled_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Factor|null $factor
 * @property-read \App\Models\SendMethod|null $send_method
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereCanceledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereFactorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor wherePostTracking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor wherePostedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereSendMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereSendPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereStockedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFactor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendFactor extends Model
{
    use HasFactory;

    protected $fillable = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\SendFactorFactory::new();
//    }

    public function factor()
    {
        return $this->belongsTo(Factor::class);
    }

    public function send_method()
    {
        return $this->belongsTo(SendMethod::class);
    }
}
