<?php

namespace Webeleven\EasyFlickr;

use Illuminate\Support\ServiceProvider;

class EasyFlickrServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        parent::__construct($app);
        require_once __DIR__ . '/phpflickr/phpFlickr.php';
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/easyflickr.php' => config_path('easyflickr.php')
        ], 'config');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EasyFlickrService::class, function () {
            return new EasyFlickrServiceDefault($this->app['config']);
        });

        $this->app->alias(EasyFlickrService::class, 'easyflickr.service');

    }
}
