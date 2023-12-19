<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\Auth\AuthRepositoryInterface;
use App\Repositories\Repository\Auth\AuthRepository;
use App\Repositories\Interfaces\RolesRepositoryInterface;
use App\Repositories\Repository\RolesRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Repository\UserRepository;

class InterfaceBindingServiceProvider extends ServiceProvider
{

    const BINDINGS = [
        AuthRepositoryInterface::class => AuthRepository::class,
        RolesRepositoryInterface::class => RolesRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
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
