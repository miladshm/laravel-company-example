<?php

namespace App\Helpers\SettingHelper\src;

use App\Helpers\SettingHelper\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfig(), 'settings');
        $this->loadMigrationsFrom($this->getMigrations());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig($this->getConfig());
        $this->publishMigrations();
        $this->loadRoutesFrom(__DIR__.'/../routes/route.php');

        if (Schema::hasTable('settings')) {
            $settings = Setting::query()->pluck('value', 'name')->toArray();
            foreach ($settings as $name => $value) {
                Config::set('settings.' . $name, $value);
            }
        }
    }

    protected function publishConfig($configPath)
    {
        $this->publishes([$configPath => config_path('settings.php')], 'config');
    }

    protected function getConfig(): string
    {
        return __DIR__ . '/../config/settings.php';
    }

    protected function getMigrations(): string
    {
        return __DIR__ . '/../database/migrations/2021_05_10_152236_create_settings_table.php';
    }

    protected function publishMigrations()
    {
        $this->publishes([
            $this->getMigrations() => database_path('migrations/2021_05_10_152236_create_settings_table.php')
        ],'migration');
    }

}
