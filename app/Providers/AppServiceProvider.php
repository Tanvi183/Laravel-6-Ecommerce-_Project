<?php

namespace App\Providers;

use View;
use App\model\admin\Category;
use Illuminate\Support\Facades\Schema;
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
        View::composer('frontend.includes.menubar', function($view){
            $categories = Category::all();
            $view->with('categories',$categories);
        });
        View::composer('frontend.includes.header', function($view){
            $categories = Category::all();
            $view->with('categories',$categories);
        });
        Schema::defaultStringLength(191);
    }
}
