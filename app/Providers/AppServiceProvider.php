<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Article;

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
       view()->composer('partials.sidebar',function($view){
           $view->with('categories',Category::paginate(10));
       });

       view()->composer('partials.morepost',function($view){
        $view->with('articles',Article::with('categories')->get());
       });


    }
}