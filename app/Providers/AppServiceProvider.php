<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // todo : check docs if this is still needed?
        // Eloquent Strictness (only throws these errors in non-production environments)
        //        Model::preventLazyLoading(! $this->app->isProduction());
        //        Model::preventAccessingMissingAttributes(! $this->app->isProduction());
        //        Model::preventSilentlyDiscardingAttributes(! $this->app->isProduction());
    }
}
