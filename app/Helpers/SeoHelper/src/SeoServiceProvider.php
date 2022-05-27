<?php

namespace App\Helpers\SeoHelper\src;

use App\Helpers\SeoHelper\src\views\Modal;
use Illuminate\Support\Facades\Blade;

class SeoServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views','seo');
//        $this->loadViewComponentsAs('seo',[
//            Modal::class
//        ]);
        $this->publishes([
            $this->getMigrationsPath() => database_path('migrations/2021_09_17_071054_create_messengers_table.php')
        ], 'seo');
        Blade::componentNamespace('App\\Helpers\\SeoHelper\\resources\\views\\components','seo');
    }

    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
//        $this->loadViewComponentsAs('seo','');
    }
    /**
     * @return string
     */
    protected function getMigrationsPath(): string
    {
        return __DIR__. '/../database/migrations/2021_05_10_152413_create_seos_table.php';
    }
}

