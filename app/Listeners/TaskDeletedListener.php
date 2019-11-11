<?php

namespace App\Listeners;

use App\Events\TaskDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskDeletedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskDeletedEvent  $event
     * @return void
     */
    public function handle(TaskDeletedEvent $event)
    {
        //
    }
}
