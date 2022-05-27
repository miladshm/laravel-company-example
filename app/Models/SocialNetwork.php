<?php

namespace App\Models;

use App\Traits\HasCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\SocialNetwork
 *
 * @property int $id
 * @property string $title
 * @property string $icon
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork newQuery()
 * @method static \Illuminate\Database\Query\Builder|SocialNetwork onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|SocialNetwork withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SocialNetwork withoutTrashed()
 * @mixin \Eloquent
 */
class SocialNetwork extends Model
{
    use HasFactory, SoftDeletes, HasCache;
    protected $fillable = ['title', 'icon', 'url'];

}
