<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Http\ViewComposers\TestComposer;
use App\Http\ViewComposers\StatuseComposer;
use App\Http\ViewComposers\CourseComposer;

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
        view()->composer('back/index', StatuseComposer::class); 
        view()->composer('back/index', CourseComposer::class); 
        view()->composer('back/students/template', TestComposer::class); 
        view()->composer('back/students/template', StatuseComposer::class); 
        view()->composer('back/students/template', CourseComposer::class);     

        Blade::if('admin', function () {
            return auth()->user()->role === 'admin';
        });  
    }
}
