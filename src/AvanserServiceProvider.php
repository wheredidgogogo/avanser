<?php

namespace Wheredidgogogo\Avanser;

use Illuminate\Support\ServiceProvider;

class AvanserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config' => config_path(),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Wheredidgogogo\Avanser\AvanserController');

        $this->app->bind('wheredidgogogo-avanser', function() {
            return new Avanser;
        });

        $this->mergeConfigFrom(
            __DIR__ . '/config/avanser.php', 'wheredidgogogo-avanser-avanser'
        );

    }
}
