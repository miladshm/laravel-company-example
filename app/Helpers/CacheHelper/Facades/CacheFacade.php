<?php


namespace App\Helpers\CacheHelper\Facades;


use App\Helpers\CacheHelper\CacheHelper;
use App\Helpers\CacheHelper\CacheTypes\BlogCache;
use App\Helpers\CacheHelper\CacheTypes\CacheType;
use App\Helpers\CacheHelper\CacheTypes\ProductCache;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

class CacheFacade extends Facade
{

    /**
     * @param Model $model
     * @return CacheHelper
     */
    public static function cacheProvider(Model $model)
    {
        return new CacheHelper($model->cacheProvider());
    }
    /**
     * @return CacheHelper
     */
    public static function contactInfo()
    {
        return new CacheHelper(new CacheType(new ContactInfo()));
    }
    /**
     * @return CacheHelper
     */
    public static function product()
    {
        return new CacheHelper(new ProductCache(new Product()));
    }

    /**
     * @return CacheHelper
     */
    public static function category()
    {
        return new CacheHelper(new CacheType(new Category()));
    }

    /**
     * @return CacheHelper
     */
    public static function blog()
    {
        return new CacheHelper(new BlogCache(new Blog()));
    }

    protected static function getFacadeAccessor()
    {
        return 'cache';
    }
}
