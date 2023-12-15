<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\Auth\AuthRepositoryInterface;
use App\Repositories\Repository\Auth\AuthRepository;

class InterfaceBindingServiceProvider extends ServiceProvider
{

    const BINDINGS = [
        AuthRepositoryInterface::class => AuthRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach (self::BINDINGS as $key => $binding) {
            $this->app->bind($key, $binding);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
