<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Blog\Database\factories\PostTypeFactory;

/**
 * App\Models\PostType
 *
 * @property int $id
 * @property string $type
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PostType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostType newQuery()
 * @method static \Illuminate\Database\Query\Builder|PostType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PostType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PostType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PostType withoutTrashed()
 * @mixin \Eloquent
 */
class PostType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

//    protected static function newFactory()
//    {
//        return PostTypeFactory::new();
//    }
}
