<?php

namespace App\Providers;

use App\Repositories\CartInterface;
use App\Repositories\CartModelRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartInterface::class,function(){
            return new CartModelRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Schema::defaultStringLength(191);
    }
}
