<?php

namespace App\Events;

use App\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskSavedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;

    public function __construct(Task $task)
    {
//        $this->task=$task;
        $id = $task->getAttributeValue('id');
        $this->task = Task::with('vendor')->find($id);
//        $this->task = Task::with('vendor')->where('id','=',$id)->get();
//        dd($this->task);
    }

    public function broadcastOn()
    {
        return ['saved-channel'];
    }

    public function broadcastAs()
    {
        return 'saved-event';
    }
}
