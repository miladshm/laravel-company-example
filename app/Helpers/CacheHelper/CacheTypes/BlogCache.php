<?php


namespace App\Helpers\CacheHelper\CacheTypes;


use App\Helpers\CacheHelper\interfaces\ICache;
use App\Models\Blog;
class BlogCache extends CacheType implements ICache
{

    /**
     * @inheritDoc
     */
    function doCache(string $key = null, array $with = null, int $take = null, array $scopes = null)
    {
        return cache()->rememberForever($key ?? $this->model->cacheKey(), function () use ($with, $take, $scopes) {
            $items = query()->scopes('active')->latest();
            if ($scopes and count($scopes))
                foreach ($scopes as $scope)
                    $items = $items->scopes($scope);
            if ($with && count($with))
                foreach ($with as $item)
                    $items = $items->with($item);
            $items = $take ? $items->take($take) : $items;
            return $items->get();
        });

    }
}
