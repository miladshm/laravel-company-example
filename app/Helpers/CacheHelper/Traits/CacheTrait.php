<?php


namespace App\Helpers\CacheHelper\Traits;


use App\Helpers\CacheHelper\CacheTypes\CacheType;
use App\Helpers\CacheHelper\Facades\CacheFacade;
use App\Helpers\CacheHelper\interfaces\ICache;

trait CacheTrait
{
    public $cacheKey;
    public $cache_count;

    protected static function bootCacheTrait()
    {
//        static::observe(app(CacheObserver::class));
        self::created(function ($model) {
            CacheFacade::cacheProvider($model)->reDoCache();
        });
        self::updated(function ($model) {
            CacheFacade::cacheProvider($model)->reDoCache();
        });
        self::deleted(function ($model) {
            CacheFacade::cacheProvider($model)->reDoCache();
        });
        self::saved(function ($model) {
            CacheFacade::cacheProvider($model)->reDoCache();
        });
    }

    /**
     * @return string
     */
    public function cacheKey()
    {
        return $this->cacheKey ?? $this->getTable();
    }


    /**
     * @return ICache
     */
    public function cacheProvider(): ICache
    {
        return new CacheType($this);
    }
}
