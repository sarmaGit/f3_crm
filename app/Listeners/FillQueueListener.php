<?php

namespace App\Listeners;

use App\Events\FillQueueAddEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FillQueueListener
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
     * @param  FillQueueAddEvent  $event
     * @return void
     */
    public function handle(FillQueueAddEvent $task)
    {

    }
}
