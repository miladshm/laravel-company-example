<?php

namespace App\Models;

use App\Traits\LogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ContactInfo
 *
 * @property int $id
 * @property string $type
 * @property string $icon
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @method static \Database\Factories\ContactInfoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContactInfo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|ContactInfo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContactInfo withoutTrashed()
 * @mixin \Eloquent
 * @property string $title
 * @property string $group
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInfo whereTitle($value)
 */
class ContactInfo extends Model
{
    use HasFactory,SoftDeletes, LogTrait;
    protected $guarded = ['id'];

}
