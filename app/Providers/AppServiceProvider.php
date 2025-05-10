<?php

namespace App\Providers;

use App\Services\AddonConfigService;
use App\Services\AddonManifestService;
use App\Services\CatalogService;
use App\Services\Interfaces\AddonConfigServiceInterface;
use App\Services\Interfaces\AddonManifestServiceInterface;
use App\Services\Interfaces\CatalogServiceInterface;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AddonConfigServiceInterface::class, AddonConfigService::class);
        $this->app->bind(AddonManifestServiceInterface::class, AddonManifestService::class);
        $this->app->bind(CatalogServiceInterface::class, CatalogService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
