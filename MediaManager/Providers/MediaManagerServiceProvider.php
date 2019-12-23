<?php

namespace MediaManager\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class MediaManagerServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->root = realpath(__DIR__ . '/../');
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(PackageServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            $this->root . '/Config/config.php' => config_path('mediamanager.php'),
        ], 'mediaManager-config');

        $this->mergeConfigFrom(
            $this->root . '/Config/config.php',
            'mediaManager'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom($this->root . '/Resources/views', 'MediaManager');

        $this->publishes([
            $this->root . '/Resources/views' => resource_path('views/vendor/MediaManager'),
        ]);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $this->loadTranslationsFrom($this->root . '/Resources/lang', 'MediaManager');

        $this->publishes([
            $this->root . '/Resources/lang' => resource_path('lang/vendor/MediaManager'),
        ]);
    }
}
