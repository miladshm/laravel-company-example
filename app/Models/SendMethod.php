<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\SendMethod
 *
 * @property int $id
 * @property string $title
 * @property int $is_active
 * @property string $class
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor[] $factors
 * @property-read int|null $factors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SendFactor[] $send_factor
 * @property-read int|null $send_factor_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Zone[] $zones
 * @property-read int|null $zones_count
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendMethod extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\SendMethodFactory::new();
//    }

    public function zones()
    {
        return $this->belongsToMany(Zone::class);
    }

    public function factors()
    {
        return $this->belongsToMany(Factor::class);
    }

    public function send_factor()
    {
        return $this->hasMany(SendFactor::class);
    }
}
