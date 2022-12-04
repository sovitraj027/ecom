<?php

namespace App\Providers;

use App\Models\Backend\Product;
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
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $product=Product::where('status',1)->get();
        $view->with('products',$product);
        });
        
    }
}
