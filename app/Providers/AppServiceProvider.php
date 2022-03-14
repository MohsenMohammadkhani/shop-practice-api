<?php

namespace App\Providers;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\JenssegersMongo\User\JenssegersMongoUserRepository;
use App\Services\User\Register\Contract\UserRegisterFactoryConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        if (!app()->environment('testing')) {
            $this->app->bind(UserRepositoryInterface::class, JenssegersMongoUserRepository::class);
            UserRegisterFactoryConfig::getInstance()->setFactories();
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

    }
}
