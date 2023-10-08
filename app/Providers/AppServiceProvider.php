<?php

namespace App\Providers;

use App\Interfaces\UserInterface;
use App\Repositories\RideInterface;
use App\Repositories\TripInterface;
use App\Repositories\RideRepository;
use App\Repositories\TripRepository;
use App\Repositories\UserRepository;
use App\Repositories\DriverInterface;
use App\Repositories\BookingInterface;
use App\Repositories\DriverRepository;
use App\Repositories\BookingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(DriverInterface::class, DriverRepository::class);
        $this->app->bind(RideInterface::class, RideRepository::class);
        $this->app->bind(BookingInterface::class, BookingRepository::class);
        $this->app->bind(TripInterface::class, TripRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}