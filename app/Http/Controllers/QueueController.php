<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Events\TaskSavedEvent;

class QueueController extends Controller
{
    public function index()
    {
//        event(new TaskSavedEvent('hello world'));
        return view('queue.index');
    }

//    public function add()
//    {
//        event(new TaskSavedEvent('hello world controller'));
//    }
}
