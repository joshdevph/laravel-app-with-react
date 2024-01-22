<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FinancialDataApiService;
use App\Services\FinancialDataServiceInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(FinancialDataApiService::class, FinancialDataApiService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
