<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Events\FillQueueAddEvent;

class QueueController extends Controller
{
    public function index()
    {
//        event(new FillQueueAddEvent('hello world'));
        return view('queue.index');
    }

//    public function add()
//    {
//        event(new FillQueueAddEvent('hello world controller'));
//    }
}
