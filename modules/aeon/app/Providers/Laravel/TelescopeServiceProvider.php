<?php

namespace Enterprise\Aeon\Providers\Laravel;

use Enterprise\Aeon\Zap\Laravel\Telescope\Storage\DatabaseEntriesRepository;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\Contracts\ClearableRepository;
use Laravel\Telescope\Contracts\EntriesRepository;
use Laravel\Telescope\Contracts\PrunableRepository;
use Laravel\Telescope\TelescopeServiceProvider as BaseTelescopeServiceProvider;

class TelescopeServiceProvider extends ServiceProvider
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
            __DIR__ . '/../../../config/laravel/telescope.php', 'telescope'
        );
    }

    protected function registerProviders(): void
    {
        $this->app->register(BaseTelescopeServiceProvider::class);
        $this->app->register(TelescopeApplicationServiceProvider::class);
    }

    protected function registerBindings(): void
    {
        $this->app->singleton(
            EntriesRepository::class, DatabaseEntriesRepository::class
        );

        $this->app->singleton(
            ClearableRepository::class, DatabaseEntriesRepository::class
        );

        $this->app->singleton(
            PrunableRepository::class, DatabaseEntriesRepository::class
        );

        $this->app->when(DatabaseEntriesRepository::class)
            ->needs('$connection')
            ->give(config('telescope.storage.database.connection'));

        $this->app->when(DatabaseEntriesRepository::class)
            ->needs('$chunkSize')
            ->give(config('telescope.storage.database.chunk'));
    }
}
