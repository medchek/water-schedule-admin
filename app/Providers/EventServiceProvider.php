<?php

namespace App\Providers;

use App\Models\Schedule;
use App\Models\Town;
use App\Models\User;
use App\Models\Wilaya;
use App\Observers\ScheduleObserver;
use App\Observers\TownObserver;
use App\Observers\UserObserver;
use App\Observers\WilayaObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Wilaya::observe(WilayaObserver::class);
        Town::observe(TownObserver::class);
        Schedule::observe(ScheduleObserver::class);
        User::observe(UserObserver::class);
    }
}
