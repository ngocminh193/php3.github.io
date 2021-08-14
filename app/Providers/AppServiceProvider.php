<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Helper\CartHelper;
use App\Models\Order;
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
    public function boot(CartHelper $cart)
    {
        Paginator::useBootstrap();
        view()->composer('*', function($view){
            $view->with([
                'cart' => new CartHelper(),
                'od_count' => Order::where('status',0)->count(),
            ]);
        });
    }
}
