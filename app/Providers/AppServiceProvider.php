<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Menu;
use Cart;
use App\Brand;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        if (\Schema::hasTable('menus'))
        {
           $menus = Menu::all();
           View::share('menus', $menus);
       }
       if(\Schema::hasTable('brands'))
       {
           $brands = Brand::all();
           View::share('brands', $brands);
       }
       if(Session('cart'))
       {
           $cart = Cart::content();
           View::share('cart', $cart);
       }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
