<?php

namespace Enterprise\Aeon\Providers\Laravel;

use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\HorizonServiceProvider as BaseHorizonServiceProvider;

class HorizonServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
        $this->registerProviders();

    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/laravel/horizon.php', 'horizon'
        );
    }

    protected function registerProviders(): void
    {
        $this->app->register(BaseHorizonServiceProvider::class);
        $this->app->register(HorizonApplicationServiceProvider::class);
    }
}
