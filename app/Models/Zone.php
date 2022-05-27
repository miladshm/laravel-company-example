<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Zone
 *
 * @property int $id
 * @property string $title
 * @property int $is_active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SendMethod[] $send_methods
 * @property-read int|null $send_methods_count
 * @method static \Illuminate\Database\Eloquent\Builder|Zone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Zone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Zone extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\ZoneFactory::new();
//    }

    public function provinces()
    {
        return $this->morphedByMany(Province::class, 'location', 'location_zone');
    }
    public function cities()
    {
        return $this->morphedByMany(City::class, 'location', 'location_zone');
    }

    public function send_methods()
    {
        return $this->belongsToMany(SendMethod::class)
            ->using(SendMethodZone::class);
    }
}
