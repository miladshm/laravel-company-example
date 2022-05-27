<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Optionable
 *
 * @property int $option_id
 * @property string $model_type
 * @property int $model_id
 * @property int $is_visible
 * @property int $is_variable
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $model
 * @property-read \App\Models\Option|null $option
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereIsVariable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Optionable whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Optionable extends Pivot
{
    use HasFactory;

    protected $guarded = [];

//    protected static function newFactory()
//    {
//        return \Modules\Shop\Database\factories\OptionableFactory::new();
//    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function model()
    {
        return $this->morphTo();
    }
}
