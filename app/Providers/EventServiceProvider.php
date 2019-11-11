<?php

namespace App\Providers;

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
        'App\Events\TaskSavedEvent' => [
            'App\Listeners\TaskSavedListener',
        ],
        'App\Events\TaskUpdatedEvent' => [
            'App\Listeners\TaskUpdatedListener',
        ],
        'App\Events\TaskDeletedEvent' => [
            'App\Listeners\TaskDeletedListener',
        ],
        'App\Events\TestEvent'=>[
            'App\Listeners\TestListener',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
