<?php

namespace App\Helpers\MessageHelper\src\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Helpers\MessageHelper\src\Models\Messenger
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger query()
 * @mixin \Eloquent
 */
class Messenger extends Model
{
    use HasFactory;
    protected $table = 'messenger';

//    protected $casts = ['value' => AsCollection::class];
}
