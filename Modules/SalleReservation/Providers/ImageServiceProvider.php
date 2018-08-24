<?php

namespace Modules\SalleReservation\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Registers the Image Resizing Service 
         */
        $this->app->bind('ImageResize', function()
        {
        return new \Modules\SalleReservation\Services\imageResize;
        });

        /**
         * Registers the Image Delete Service
         */
        $this->app->bind('ImageDelete', function()
        {
        return new \Modules\SalleReservation\Services\imageDelete;
        });
    
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
