<?php

namespace Modules\SalleReservation\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class SalleReservationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->adminlteNav($events);
        
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        ImageServiceProvider::class;
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('sallereservation.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'sallereservation'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/sallereservation');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/sallereservation';
        }, \Config::get('view.paths')), [$sourcePath]), 'sallereservation');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/sallereservation');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'sallereservation');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'sallereservation');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
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
    /**
     * Add DropDown to AdminLTE navigation for the rooms and the Calendar
     * 
     * @return $event->menu
     */
    public function adminlteNav($events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $array = [
                [
                    "text" => "Room Reservation",
                    "icon" => "share",
                    "submenu" => [
                        [
                            "text" => "Calendar",
                            "href" => env('APP_URL').'/sallereservation/calendar',
                            "active" => false,
                            "classes" => [],
                            "class" => "",
                            "top_nav_classes" => [],
                            "top_nav_class" => "",
                  
                        ],
                        [
                            "text" => "Rooms",
                            "href" => env('APP_URL').'/sallereservation/rooms',  
                            "active" => false,
                            "classes" => [],
                            "class" => "",
                            "top_nav_classes" => [],
                            "top_nav_class" => "",
                        ],
                    ],
                    "href" => "#",
                    "active" => false,
                    "submenu_open" => false,
                    "submenu_classes" =>[ 0 => "treeview-menu"],
                    "submenu_class" => "treeview-menu",
                    "classes" => [0 => "treeview"],
                    "class" => "treeview",
                    "top_nav_classes" =>[0 => "dropdown"],
                    "top_nav_class" => "dropdown",
                    ]
                ];
                array_splice($event->menu->menu, 1, 0, $array);
                //dd($event->menu);
            
        });
    }
}
