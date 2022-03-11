<?php

namespace ATStudio\TranslationManager;

use Illuminate\Support\ServiceProvider;

class TranslationManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerViews();
        $this->publishAssets();
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
