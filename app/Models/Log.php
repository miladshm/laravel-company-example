<?php

namespace App\Models;

use App\Helpers\MessageHelper\src\Facades\Messenger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Log
 *
 * @property int $id
 * @property int $loggable_id
 * @property string $loggable_type
 * @property int|null $created_by
 * @property string|null $created_time
 * @property int|null $updated_by
 * @property string|null $updated_time
 * @property int|null $deleted_by
 * @property string|null $deleted_time
 * @property-read Model|\Eloquent $loggable
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereLoggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereLoggableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedTime($value)
 * @mixin \Eloquent
 */
class Log extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }
}
