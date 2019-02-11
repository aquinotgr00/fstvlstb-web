<?php

namespace Modules\Admins;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Database\Eloquent\Factory;
use Modules\Admins\Http\Middleware\RedirectIfAdmin;
use Modules\Admins\ExceptionHandler as AdminHandler;

class AdminsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ExceptionHandler::class, AdminHandler::class);
    }

    public function boot(Router $router, Factory $factory)
    {
        $this->loadConfig();
        $this->loadRoutes($router);
        $this->loadViews();
        $this->loadMigrationsAndFactories($factory);
        $this->aliasMiddlewares($router);
        $this->mergeAuthConfig();
    }

    private function loadConfig()
    {
        $path = __DIR__.'/../config/admins.php';
        $this->mergeConfigFrom($path, 'admins');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $path => config_path('admins.php'),
            ], 'admins:config');
        }
    }

    private function loadRoutes(Router $router)
    {
        $router->prefix(config('admins.prefix', 'admin'))
               ->namespace('Modules\Admins\Http\Controllers')
               ->middleware(['web'])
               ->group(function () {
                   $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
               });
    }

    private function loadViews()
    {
        $path = __DIR__.'/../resources/views';
        $this->loadViewsFrom($path, 'admins');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $path => resource_path('views/vendor/admins'),
            ], 'admins:views');
        }
    }

    private function loadMigrationsAndFactories(Factory $factory)
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $factory->load(__DIR__.'/../database/factories');
        }
    }

    private function aliasMiddlewares(Router $router)
    {
        $router->aliasMiddleware('admin_guess', RedirectIfAdmin::class);
    }

    private function mergeAuthConfig()
    {
        $original = $this->app['config']->get('auth', []);
        $toMerge = require __DIR__ . '/../config/auth.php';

        $auth = [];
        foreach ($original as $key => $value) {
            if (isset($toMerge[$key])) {
                $auth[$key] = array_merge($value, $toMerge[$key]);
            } else {
                $auth[$key] = $value;
            }
        }

        $this->app['config']->set('auth', $auth);
    }
}
