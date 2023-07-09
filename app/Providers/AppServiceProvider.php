<?php

namespace App\Providers;

use App\Models\Model\Product;
use Illuminate\Support\ServiceProvider;
use Flat3\Lodata\Facades\Lodata;


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
        Lodata::discover(Product::class);
    }
}
