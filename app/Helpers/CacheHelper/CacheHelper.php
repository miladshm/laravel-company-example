<?php


namespace App\Helpers\CacheHelper;


use App\Helpers\CacheHelper\interfaces\ICache;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use mysql_xdevapi\Collection;

class CacheHelper
{
    private $cache;

    /**
     * @param ICache $cacheType
     */
    public function __construct(ICache $cacheType)
    {
        $this->cache = $cacheType;
    }

    /**
     * @param string|null $key
     * @param array|null $with
     * @param int|null $take
     * @return mixed
     */
    public function doCache(string $key = null, array $with = null, int $take = null)
    {
        return $this->cache->doCache($key, $with, $take);
    }

    public function reDoCache(string $key = null, array $with = null, int $take = null)
    {
        return $this->cache->reDoCache($key, $with, $take);
    }

    /**
     * @param null $key
     * @param array|null $where
     * @param int|null $perPage
     * @param bool $new
     * @return mixed
     */
    public function getCache($key = null, array $where = null, int $perPage = null, $new = false)
    {
        $items = $this->cache->getCache($key, $where, $new);
        if ($perPage)
            return $this->paginate($items, $perPage);
        return $items;
    }

    private function paginate($items, $take = null)
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
