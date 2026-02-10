<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // Fix for MySQL/MariaDB key length issue with utf8mb4
        // 191 * 4 bytes = 764 bytes (under the 1000 byte limit)
        Schema::defaultStringLength(191);
    }
}
