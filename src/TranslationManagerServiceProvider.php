<?php

namespace ATStudio\TranslationManager;

use ATStudio\TranslationManager\Commands\ScanFiles;
use Illuminate\Support\ServiceProvider;

class TranslationManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerCommands();
        $this->registerRoutes();
        $this->registerViews();
        $this->publishAssets();
    }

    private function registerConfig(): void
    {
        $this->publishes([
            __DIR__.'/../config/tm.php' => config_path('tm.php'),
        ], 'tm-config');

        $this->mergeConfigFrom(__DIR__.'/../config/tm.php', 'tm');
    }

    private function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ScanFiles::class,
            ]);
        }
    }

    private function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    private function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tm');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/tm'),
        ], 'tm-views');
    }

    private function publishAssets(): void
    {
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/translation-manager'),
        ], 'tm-assets');
    }
}
