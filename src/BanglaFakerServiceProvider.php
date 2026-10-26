<?php

namespace Tusharkhan\BanglaFaker;

use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use Tusharkhan\BanglaFaker\Faker\BanglaFakerProvider;

class BanglaFakerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'banglafaker');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'banglafaker');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

//        if ($this->app->runningInConsole()) {
//            $this->publishes([
//                __DIR__ . '/../config/config.php' => config_path('banglafaker.php'),
//            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/banglafaker'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/banglafaker'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/banglafaker'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
//        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
//        $this->mergeConfigFrom(__DIR__ . '/../tusharKhan/Faker/config/config.php', 'banglafaker');

        // Register the main class to use with the facade
        $this->app->singleton('BanglaFaker', function () {
            return new BanglaFaker;
        });

        $this->registerFakerProvider();
    }

    /**
     * Add the bangla* formatters to every Faker generator Laravel resolves
     * (fake(), factories). Faker is usually a dev dependency, so skip quietly
     * when it isn't installed.
     */
    protected function registerFakerProvider()
    {
        if (! class_exists(Generator::class)) {
            return;
        }

        $this->app->afterResolving(Generator::class, function (Generator $generator) {
            // Laravel caches generators per locale across resolutions; add the provider once
            foreach ($generator->getProviders() as $provider) {
                if ($provider instanceof BanglaFakerProvider) {
                    return;
                }
            }

            $generator->addProvider(new BanglaFakerProvider());
        });
    }
}
