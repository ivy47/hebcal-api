<?php


namespace Ivy47\HebcalApi;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\DoctrineCacheStorage;
use Kevinrob\GuzzleCache\Storage\LaravelCacheStorage;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;

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
        $this->app->singleton(HebcalApi::class, function ($app) {
            $config = [
                'base_uri' => config('hebcal.base_uri'),
            ];

            if (config('hebcal.use_cache') === true) {
                $stack = HandlerStack::create();

                $stack->push(new CacheMiddleware(
                    new PrivateCacheStrategy(
                        new LaravelCacheStorage(
                            Cache::store(config('hebcal.cache_store'))
                        )
                    )
                ), 'cache');

                $config['handler'] = $stack;
            }

            $client = new Client($config);

            return new HebcalApi($client, [
                'hebcal_uri' => config('hebcal.hebcal_uri'),
                'converter_uri' => config('hebcal.converter_uri')
            ]);
        });
    }
}