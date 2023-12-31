<?php

namespace App\Providers;

use App\Repositories\CursoEloquentORM;
use App\Repositories\CursoRepositoryInterface;
use App\Repositories\Registrations\RegistrationEloquentORM;
use App\Repositories\Registrations\RegistrationRepositoryInterface;
use App\Repositories\Students\StudentEloquentORM;
use App\Repositories\Students\StudentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CursoRepositoryInterface::class, CursoEloquentORM::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentEloquentORM::class);
        $this->app->bind(RegistrationRepositoryInterface::class, RegistrationEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
