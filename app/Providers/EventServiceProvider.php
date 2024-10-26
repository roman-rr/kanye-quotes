<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Listeners\UpdateUserLoginAt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Can create listener in case of big event handler
        Event::listen(function (Login $event) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->update(['last_login_at' => Carbon::now()]);

            // Activity log - user login
        });

        // Can create listener in case of big event handler
        Event::listen(function (Logout $event) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            // Activity log - user logout
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
