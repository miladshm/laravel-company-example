<?php


namespace App\Helpers\CacheHelper\CacheTypes;


use App\Helpers\CacheHelper\interfaces\ICache;

class ProductCache extends CacheType implements ICache
{


    function doCache(string $key = null, array $with = null, int $take = null, array $scopes = null)
    {
        $with = $with ?? [];
        $scopes = $scopes ?? [];
        array_push($with, ['categories']);
        array_push($scopes, ['active']);
        return parent::doCache($key, $with, $take, $scopes);
    }


}
