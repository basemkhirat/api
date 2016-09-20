<?php

namespace BasemKhirat\API;

use Illuminate\Support\ServiceProvider;

class APIServiceProvider extends ServiceProvider
{

    function __construct()
    {
        $this->path = dirname(__FILE__);
        $this->app = app();
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->path . '/config/' => config_path(),
        ], "api.config");

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('api', function () {
            $config = isset($this->app['config']['api']["default"]) ? $this->app['config']['api']["default"] : [];
            return new \Basemkhirat\API\API($config);
        });
    }
}