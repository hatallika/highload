<?php

namespace App\Providers;

use App\Cache\AppMemcached;
use App\Cache\AppMemcachedInterface;
use App\Handlers\LoggerHandler;
use App\Handlers\LoggerHandlerInterface;
use App\Services\MemcacheService;
use App\Services\MemcacheServiceInterface;
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
        $this->app->bind(LoggerHandlerInterface::class, LoggerHandler::class);
        $this->app->bind(MemcacheServiceInterface::class, MemcacheService::class);
        $this->app->bind(AppMemcachedInterface::class, AppMemcached::class);
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
