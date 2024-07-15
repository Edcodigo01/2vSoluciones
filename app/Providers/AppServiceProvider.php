<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use App\Video;
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
        Blade::if('Videos', function () {
            $videos = Video::all()->count();
            if($videos == 0){
                return false;
            }else{
                return true;
            }
        });

        Blade::if('Route', function ($name){
            return $name == request()->route()->getName();
        });
    }
}
