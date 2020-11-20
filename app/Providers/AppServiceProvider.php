<?php

namespace App\Providers;

use App\Model\Admin\Categories;
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
        $menu = Categories::where('parent_id',0)->get();
        View::share('menu',$menu);
    }
}
