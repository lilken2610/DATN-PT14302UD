<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Brands;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::defaultView('common.paginate');
    }
}
