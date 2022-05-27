<?php


namespace App\Traits;


use Arr;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

trait HasCache
{
    public string $cacheKey;
    public function reDoCache($key = null)
    {
        Cache::forget($key ?? $this->cacheKey());
        $this->doCache();
    }

    public function cacheKey(): string
    {
        return $this->cacheKey ?? $this->getTable();
    }

    /**
     * @param string|null $key
     * @param array|null $with
     */
    public function doCache(string $key = null, array $with = null)
    {
        if (in_array('HasDetails',class_uses($this)))
            Arr::prepend($with,'details');
        return Cache::rememberForever($key ?? self::cacheKey(), function () use ($with) {
            return self::query()->with(is_array($with) ? $with : [])->get();
        });
    }


    /**
     * @param string|null $key
     * @param int|null $perPage
     * @return Model|LengthAwarePaginator
     */
    public static function getCache(int $perPage = null,string $key = null)
    {
        $item = new self();
        $items = $item->doCache($key ?? $item->cacheKey());
        if ($perPage)
            return $item->paginate($items,$perPage);
        else return $items;
    }

    protected static function boot()
    {
        parent::boot();
        self::created(function ($item){
            $item->reDoCache();
        });
        self::updated(function ($item){
            $item->reDoCache();
        });
        self::deleted(function ($item){
            $item->reDoCache();
        });
//        self::saved(function () use ($item){
//            $this->reDoCache();
//        });
    }

    /**
     * @param $items
     * @param null $take
     * @return LengthAwarePaginator
     */
    private function paginate($items, $take = null): LengthAwarePaginator
    {
        $page = LengthAwarePaginator::resolveCurrentPage('page');
        $paginatedItems = $items->reject(function ($value, $key) use ($page, $take) {
            return $key < ($take ?? 10) * ($page - 1);
        })->take(($take ?? 10));
        return new LengthAwarePaginator($paginatedItems, count($items), $take ?? 10, null, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
}
