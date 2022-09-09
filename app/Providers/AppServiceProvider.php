<?php

namespace App\Providers;

use App\Models\ServiceCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\ContactModel;
use App\Models\Section;
use App\Models\Service;
use App\Models\StudyabroadModel;

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
            $view->with('facebookpixel', DB::table('settings')->where('group_name','facebook_pixel')->get()->first());
            $view->with('contact', ContactModel::where('country','Australia')->get()->first());
            $view->with('social_link', DB::table('settings')->where('group_name','social_link')->get());
            $view->with('google_ads', DB::table('settings')->where('group_name','google_analytic')->get());
            $view->with('global_settings', DB::table('settings')->where('group_name','global_settings')->get());
            $wizards = DB::table('settings')->where('group_name', 'wizard')->get();
            $result = [];
            foreach($wizards as $wizard){  
                $result[$wizard->settings_name] = $wizard->settings_value;
            }

            $view->with('wizard', $result);
            
            $stdServiceCategory = ServiceCategory::where('category_slug', 'student-services')->get()->first();
            $view->with('studentservices', Service::where('service_category_id', $stdServiceCategory->id)->where('service_status', 1)->orderBy('service_title','asc')->get());
            
            $servicesCategory = ServiceCategory::where('category_slug', 'services')->get()->first();
            $view->with('services', Service::where('service_category_id', $servicesCategory->id)->where('service_status', 1)->orderBy('service_title','asc')->get());
            
            $hotcoursesCategory = ServiceCategory::where('category_slug', 'popular-courses-bd')->get()->first();
            $view->with('hotcourses', Service::where('service_category_id', $hotcoursesCategory->id)->where('service_status', 1)->get());
            
            
            $courseCategory = ServiceCategory::where('category_slug', 'popular-courses')->get()->first();
            $view->with('popularcourses', Service::where('service_category_id', $courseCategory->id)->where('service_status', 1)->orderBy('service_title','asc')->get());
            
            $migrationsCategory = ServiceCategory::where('category_slug', 'migration-services')->get()->first();

            $view->with('migrations', Service::where('service_category_id', $migrationsCategory->id)->where('service_status', 1)->get());
            $view->with('studyabroads', StudyabroadModel::where('studyabroad_status', 1)->get());
         
            
        });
        
        View::composer('frontend.includes.footer', function($view) {
            $view->with('social_link', DB::table('settings')->where('group_name','social_link')->get());
            $view->with('contact', ContactModel::where('country','Australia')->get()->first());
            $view->with('servicecategories', ServiceCategory::get());
            
            $view->with('global_settings', DB::table('settings')->where('group_name','global_settings')->get());
            
            $baseUrl = $_SERVER['HTTP_HOST'];
            if($baseUrl == "apollointl.com.au" || $baseUrl == "www.apollointl.com.au"){
                $view->with('global_settings', DB::table('settings')->where('group_name','global_settings')->where('country_id', 1)->get());
            }
            if($baseUrl == "apollointl.com.bd" || $baseUrl == "www.apollointl.com.bd"){
                $view->with('global_settings', DB::table('settings')->where('group_name','global_settings')->where('country_id', 2)->get());
            }
            
            
            $section = Section::where('section_name','About The Company')->get()->first();
            $companyabout = json_decode($section->section_value);
            $view->with('companyabout', $companyabout);
            
        });

        Blade::component('components.backend-breadcrumbs', 'backendBreadcrumbs');
    }
}
