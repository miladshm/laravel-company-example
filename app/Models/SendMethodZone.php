<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\SendMethodZone
 *
 * @property int $zone_id
 * @property int $send_method_id
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethodZone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethodZone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethodZone query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethodZone whereSendMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethodZone whereZoneId($value)
 * @mixin \Eloquent
 */
class SendMethodZone extends Pivot
{
    use HasFactory;

    protected $guarded = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\SendMethodZoneFactory::new();
//    }
}
