<?php


namespace App\Traits;


use App\Models\Log;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait LogTrait
{
    /**
     * @return MorphMany
     */
    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class,'loggable');
    }

    protected static function boot()
    {
        parent::created(function ($item) {
            $item->logs()->create([
                'created_by' => auth()->id(),
                'created_time' => now()->toDateTimeString()
            ]);
        });

        parent::updated(function ($item) {
            $item->logs()->updateOrCreate([
                'updated_by' => auth()->id(),
                'updated_time' => now()->toDateTimeString()
            ]);
        });

        parent::deleted(function ($item) {
            $item->logs()->updateOrCreate([
                'deleted_by' => auth()->id(),
                'deleted_time' => now()->toDateTimeString()
            ]);
        });
        parent::boot();
    }

}
