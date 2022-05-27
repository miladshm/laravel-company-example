<?php

namespace App\Helpers\PhotoSizeHelper\src;

use App\Helpers\PhotoSizeHelper\src\View\Components\Size;
use Illuminate\Support\ServiceProvider;

class PhotoSizeServiceProvider extends ServiceProvider
{

    /**
     * Register photo size services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfig(), 'photo_sizes');
    }

    protected function getConfig(): string
    {
        return __DIR__ . '/../config/photo_sizes.php';
    }

    /**
     * Bootstrap photo size services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewComponentsAs('photo', [Size::class]);
        $this->publishConfig();
    }

    protected function publishConfig()
    {
        $this->publishes([$this->getConfig() => config_path('photo_sizes.php')], 'config');
    }

    protected function getViewPath(): string
    {
        return __DIR__ . '/../resources/views';
    }
}
