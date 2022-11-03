<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;

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
        // dd(Route::currentRouteName());
        // Model::preventLazyLoading(! app()->isProduction());
        $data = DB::table('seo_details')->get()->toArray();
        $main_details = array();
        foreach ($data as $one) {
            $main_details[$one->route] = (array) $one;
        }

        $data = DB::table('custom_influencer_pages')->get();
        $pages = [];
        foreach ($data as $value) {
            // code...
            $pages[]= [$value->slug,$value->title];
        }
        
        $main_details['pages'] = $pages;
        // dd($main_details);
        View::share('shared_data', $main_details);

        Paginator::defaultView('vendor.pagination.custom');
 
        Paginator::defaultSimpleView('vendor.pagination.simple-default');
        
    }
}
