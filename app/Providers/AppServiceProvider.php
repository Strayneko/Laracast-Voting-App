<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('layouts.app', function ($view) {
        //     $view->with([
        //         'categories' => Category::all(),
        //     ]);
        // });

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
    }
}
