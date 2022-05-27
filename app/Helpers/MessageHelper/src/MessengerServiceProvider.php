<?php

namespace App\Helpers\MessageHelper\src;

use App\Helpers\MessageHelper\src\Models\Messenger;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Schema;

class MessengerServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfigPath(),'messenger');
        $this->app->bind('Messenger', function (){
            return new \App\Helpers\MessageHelper\src\Messenger();
        });
    }

    /**
     * Boot any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfigFile();
        $this->publishMigrationFile();
        if (Schema::hasTable('messenger')) {
            $settings = Messenger::query()->pluck('value', 'name')->toArray();
            foreach ($settings as $name => $value) {
                Config::set('settings.' . $name, $value);
            }
        }
    }

    /**
     * Get package config file path
     *
     * @return string
     */
    protected function getConfigPath(): string
    {
        return __DIR__ . '/../config/messenger.php';
    }

    /**
     * @return string
     */
    protected function getMigrationsPath(): string
    {
        return __DIR__. '/../database/migrations/2021_09_17_071054_create_messengers_table.php';
    }

    /**
     * Publish config file to config directory
     */
    protected function publishConfigFile()
    {
        $this->publishes([$this->getConfigPath() => config_path('messenger.php')],'config');
    }

    /**
     * Publish migration file to migrations directory
     */
    protected function publishMigrationFile()
    {
        $this->publishes([
            $this->getMigrationsPath() => database_path('migrations/2021_09_17_071054_create_messengers_table.php')
        ], 'migrations');
    }
}
