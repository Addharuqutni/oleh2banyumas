<?php

namespace App\Providers;

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
        // Load helper class
        require_once app_path('Helpers/LocationHelper.php');
        
        // Register the sitemap command
        if ($this->app->runningInConsole()) {
            $this->commands([
                \App\Console\Commands\GenerateSitemap::class,
            ]);
        }
    }
}
