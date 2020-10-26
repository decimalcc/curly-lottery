<?php

namespace App\Providers;

use App\Repositories\Interfaces\SettingsRepositoryInterface;
use App\Repositories\Interfaces\ThingRepositoryInterface;
use App\Repositories\Interfaces\ThingUserRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\SettingsRepository;
use App\Repositories\ThingRepository;
use App\Repositories\ThingUserRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(ThingRepositoryInterface::class, ThingRepository::class);
        $this->app->bind(ThingRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ThingUserRepositoryInterface::class, ThingUserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
