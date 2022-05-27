<?php


namespace App\Helpers\CacheHelper\interfaces;


interface ICache
{
    /**
     * @param string|null $key
     * @param array|null $with
     * @param int|null $take
     * @param array|null $scopes
     * @return mixed
     */
    function doCache(string $key = null, array $with = null, int $take = null, array $scopes = null);

    /**
     * @param null $key
     * @param array|null $where
     * @param bool $new
     * @return mixed
     */
    function getCache($key = null, array $where = null, bool $new = false);

    /**
     * @param string|null $key
     * @param array|null $with
     * @param int|null $take
     * @param array|null $scopes
     * @return mixed
     */
    function reDoCache(string $key = null, array $with = null, int $take = null, array $scopes = null);
}
