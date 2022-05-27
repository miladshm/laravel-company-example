<?php


namespace App\Helpers\CacheHelper\CacheTypes;


use App\Helpers\CacheHelper\interfaces\ICache;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Psr\SimpleCache\InvalidArgumentException;

class CacheType implements ICache
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     *
     * @param null $key
     * @param array|null $where
     * @param bool $new
     * @return mixed
     * @throws InvalidArgumentException
     */
    function getCache($key = null, array $where = null, bool $new = false)
    {
        if ($new)
            $items = $this->reDoCache($key ?? $this->model->cacheKey());
        else
            $items = $this->doCache($key ?? $this->model->cacheKey());
        if ($where) {
            if (Arr::has($where,'type'))
                $items = $items->filter(function ($q) use ($where) {
                    return $where['type'] = $q->type;
                });
            if (Arr::has($where,'category_id'))
                $items = $items->filter(function ($q) use ($where) {
                    return $where['category_id'] = $q->category_id;
                });
        }
        return $items;
    }

    /**
     * @param string|null $key
     * @param array|null $with
     * @param int|null $take
     * @param array|null $scopes
     * @return mixed
     * @throws InvalidArgumentException
     */
    function reDoCache(string $key = null, array $with = null, int $take = null, array $scopes = null)
    {
        if (cache()->has($key ?? $this->model->cacheKey()))
            cache()->forget($key ?? $this->model->cacheKey());
        return $this->doCache($key ?? $this->model->cacheKey(), $with, $take, $scopes);
    }

    function doCache(string $key = null, array $with = null, int $take = null, array $scopes = null)
    {
        return cache()->rememberForever($key ?? $this->model->cacheKey(), function () use ($with, $take, $scopes) {
            $items = $this->model->query()->latest();
            if ($with && count($with))
                foreach ($with as $rel)
                    $items = $items->with($rel);
            if ($scopes && count($scopes))
                foreach ($scopes as $scope)
                    $items = $items->scopes($scope);
            if ($take)
                $items = $items->take($take);

            return $items->get();
        });
    }
}
