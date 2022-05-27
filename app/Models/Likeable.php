<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Likeable
 *
 * @property int $user_id
 * @property string $likeable_type
 * @property int $likeable_id
 * @method static \Illuminate\Database\Eloquent\Builder|Likeable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Likeable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Likeable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Likeable whereLikeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Likeable whereLikeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Likeable whereUserId($value)
 * @mixin \Eloquent
 */
class Likeable extends Pivot
{
    //
}
