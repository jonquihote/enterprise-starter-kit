<?php

namespace Enterprise\Base\Providers;

use Enterprise\Aeon\Enums\ModulesEnum;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected ModulesEnum $module = ModulesEnum::BASE;

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        $title = $this->module->title();
        $slug = $this->module->slug();

        Route::group([
            'middleware' => ['web'],
            'prefix' => $slug,
            'as' => "{$slug}::",
        ], function () use ($title): void {
            $this->loadRoutesFrom(module_path($title, '/routes/web.php'));
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        $title = $this->module->title();
        $slug = $this->module->slug();

        Route::group([
            'middleware' => ['api'],
            'prefix' => "{$slug}/v1",
            'as' => "{$slug}::v1.",
        ], function () use ($title): void {
            $this->loadRoutesFrom(module_path($title, '/routes/api-v1.php'));
        });
    }
}
