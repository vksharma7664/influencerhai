<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
        $data = DB::table('seo_details')->get()->toArray();
        $main_details = array();
        foreach ($data as $one) {
            $main_details[$one->route] = (array) $one;
        }
        // dd($main_details);
        View::share('shared_data', $main_details);
        
    }
}
