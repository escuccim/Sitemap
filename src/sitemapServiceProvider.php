<?php
namespace Escuccim\Sitemap;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class sitemapServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // use this if your package has views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'escuccim');

        // use this if your package has lang files
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'escuccim');

        // use this if your package has routes
        $this->setupRoutes($this->app->router);

        // load our migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // publish config if necessary
         $this->publishes([
             __DIR__.'/config/config.php' => config_path('sitemap.php'),
         ], 'config');

         $this->publishes([
             __DIR__ . '/resources/views' => base_path('resources/views/vendor/escuccim')
         ], 'views');

        // use the default configuration file as fallback
         $this->mergeConfigFrom(
             __DIR__.'/config/config.php', 'sitemap'
         );
    }
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Escuccim\Sitemap\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });
    }
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerClass();

        // specify the config file
         config([
                 'config/sitemap.php',
         ]);
    }
    private function registerClass()
    {
        $this->app->bind('escuccim',function($app){
            return new SiteMapClass($app);
        });
    }
}