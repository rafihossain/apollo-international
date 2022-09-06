<?php

namespace App\Providers;

use App\Models\ServiceCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        View::composer('frontend.includes.header', function($view) {
            $view->with('servicecategories', ServiceCategory::get());
        });

        Blade::component('components.backend-breadcrumbs', 'backendBreadcrumbs');
    }
}
