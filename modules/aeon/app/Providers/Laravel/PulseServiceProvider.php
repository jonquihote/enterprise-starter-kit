<?php

namespace Enterprise\Aeon\Providers\Laravel;

use Enterprise\Aeon\Zap\Laravel\Pulse\Storage\DatabaseStorage;
use Illuminate\Support\ServiceProvider;
use Laravel\Pulse\Contracts\Storage;
use Laravel\Pulse\PulseServiceProvider as BasePulseServiceProvider;

class PulseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
        $this->registerProviders();
        $this->registerBindings();
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/laravel/pulse.php', 'pulse'
        );
    }

    protected function registerBindings(): void
    {
        $this->app->bind(Storage::class, DatabaseStorage::class);
    }

    protected function registerProviders(): void
    {
        $this->app->register(BasePulseServiceProvider::class);
    }
}
