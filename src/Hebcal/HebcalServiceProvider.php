<?php


namespace Ivy47\HebcalApi\Hebcal;

use Illuminate\Support\ServiceProvider;

class HebcalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/hebcal.php', 'hebcal'
        );

        $this->publishes([
            __DIR__ . '/../config/hebcal.php' => config_path('hebcal.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('HebcalApi', function ($app) {
            $client = new Client([
                'base_uri' => config('hebcal.base_uri')
            ]);

            return new Hebcal($client, config('hebcal.hebcal_uri'));
        });
    }
}