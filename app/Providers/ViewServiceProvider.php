<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \View::composer('master', function ($view) {
            $view->with('types', \App\Models\Product::select('type')->distinct()->pluck('type'));
        });
    }
}
