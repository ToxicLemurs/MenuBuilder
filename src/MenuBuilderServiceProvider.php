<?php

namespace ToxicLemurs\MenuBuilder;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class MenuBuilderServiceProvider
 * @package ToxicLemurs\MenuBuilder
 */
class MenuBuilderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Setup views
        $this->loadViewsFrom(realpath(__DIR__ . '/resources/views'), 'menuBuilder');

        // Setup routes
        $this->setupRoutes($this->app->router);

        // Publish migrations
        $this->publishes([
            realpath(__DIR__ . '/database/migrations') => database_path('/migrations')
        ], 'migrations');

        // Publish views
        $this->publishes([
            realpath(__DIR__ . '/resources/views') => base_path('resources/views/vendor/menuBuilder'),
        ], 'views');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'ToxicLemurs\MenuBuilder\Http\Controllers'], function ($router) {
            require __DIR__ . '/Http/routes.php';
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMenuBuilder();
    }

    /**
     * Register the menu builder service
     *
     * @return void
     */
    private function registerMenuBuilder()
    {
        $this->app->bind('menuBuilder', function ($app) {
            return new MenuBuilder($app);
        });
    }
}
