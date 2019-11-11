<?php

namespace App\Listeners;

use App\Events\TaskSavedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskSavedListener
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
     * @param  TaskSavedEvent  $event
     * @return void
     */
    public function handle(TaskSavedEvent $task)
    {

    }
}
