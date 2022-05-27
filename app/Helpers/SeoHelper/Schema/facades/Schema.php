<?php


namespace App\Helpers\SchemaHelper\facades;


use App\Helpers\SchemaHelper\SchemaHelper;
use App\Helpers\SchemaHelper\types\AboutPage;
use App\Helpers\SchemaHelper\types\BlogList;
use App\Helpers\SchemaHelper\types\BlogSchema;
use App\Helpers\SchemaHelper\types\BreadCrumb;
use App\Helpers\SchemaHelper\types\ContactPage;
use App\Helpers\SchemaHelper\types\FaqPage;
use App\Helpers\SchemaHelper\types\ImageGallery;
use App\Helpers\SchemaHelper\types\MainPage;
use App\Helpers\SchemaHelper\types\Portfolio;
use App\Helpers\SchemaHelper\types\PortfolioList;
use App\Helpers\SchemaHelper\types\Product;
use App\Helpers\SchemaHelper\types\ProductList;
use App\Helpers\SchemaHelper\types\Service;
use App\Helpers\SchemaHelper\types\ServiceList;
use Illuminate\Support\Facades\Facade;

class Schema extends Facade
{
    /**
     * @return SchemaHelper
     */
    public static function breadcrumb(): SchemaHelper
    {
        return new SchemaHelper(new BreadCrumb());
    }

    /**
     * @return SchemaHelper
     */
    public static function productList(): SchemaHelper
    {
        return new SchemaHelper(new ProductList());
    }

    /**
     * @return SchemaHelper
     */
    public static function product(): SchemaHelper
    {
        return new SchemaHelper(new Product());
    }

    /**
     * @return SchemaHelper
     */
    public static function blog(): SchemaHelper
    {
        return new SchemaHelper(new BlogSchema());
    }

    /**
     * @return SchemaHelper
     */
    public static function blogList(): SchemaHelper
    {
        return new SchemaHelper(new BlogList());
    }

    /**
     * @return SchemaHelper
     */
    public static function about()
    {
        return new SchemaHelper(new AboutPage());
    }

    /**
     * @return SchemaHelper
     */
    public static function main()
    {
        return new SchemaHelper(new MainPage());
    }

    /**
     * @return SchemaHelper
     */
    public static function contact(): SchemaHelper
    {
        return new SchemaHelper(new ContactPage());
    }

    /**
     * @return SchemaHelper
     */
    public static function portfolio(): SchemaHelper
    {
        return new SchemaHelper(new Portfolio());
    }

    /**
     * @return SchemaHelper
     */
    public static function portfolioList(): SchemaHelper
    {
        return new SchemaHelper(new PortfolioList());
    }

    /**
     * @return SchemaHelper
     */
    public static function service(): SchemaHelper
    {
        return new SchemaHelper(new Service());
    }

    /**
     * @return SchemaHelper
     */
    public static function serviceList(): SchemaHelper
    {
        return new SchemaHelper(new ServiceList());
    }

    /**
     * @return SchemaHelper
     */
    public static function faq(): SchemaHelper
    {
        return new SchemaHelper(new FaqPage());
    }

    public static function imageGallery(): SchemaHelper
    {
        return new SchemaHelper(new ImageGallery());
    }

    protected static function getFacadeAccessor()
    {
        return 'Schema';
    }
}
