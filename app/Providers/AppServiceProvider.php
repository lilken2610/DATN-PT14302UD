<?php

namespace App\Providers;

use App\Model\Admin\Categories;
use App\Model\Admin\Brands;
use Illuminate\Support\Facades\View;
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
        View::share('urlPublicShoes',getenv('urlPublicShoes'));
        View::share('urlPublicAdmin',getenv('urlPublicAdmin'));
        View::share('urlStorage',getenv('urlStorage'));
        $menu = Categories::all();
        $menuBrand = Brands::all();
        View::share(['menu'=>$menu, 'menuBrand'=> $menuBrand ]);
    }
}
