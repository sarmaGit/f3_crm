<?php

namespace App\Http\Controllers;

use App\Events\TaskSavedEvent;
use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    // Get param date
    private $dt;
    // Get param order_by
    private $order_by;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Will passed to view
        $dt_view = $this->get_date($request->datepicker);

        $this->order_by($request->order_by);

        $tasks = Task::tasks($this->dt, $this->order_by);

        return view('tasks.index', compact('tasks', 'dt_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get vendors name for select field
        $vendors = Vendor::get(['id', 'vendor_name']);

        return view('tasks.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[а-яА-Я]{3,20}$/um',
            'phone_number' => 'required|numeric|regex:/^\d{11}$/m',
//            'vendor_code' => 'required|integer',
            'vendor_name' => 'required',
            'model' => 'nullable',
        ]);

        $expire_at = ['expire_at' => Carbon::now()->addMinutes($request->expire_at)->toDateTimeString()];
        $data = array_merge($validatedData, $expire_at);
        $task = Task::create($data);
//        event(new TaskSavedEvent($task));
        return redirect('/tasks')->with('success', 'Клиент добавлен в очередь');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $vendors = Vendor::get(['id', 'vendor_name']);
        return view('tasks.edit', compact('task', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[а-яА-Я]{3,20}$/um',
            'phone_number' => 'required|numeric|regex:/^\d{11}$/m',
            'vendor_id' => 'required|integer',
            'model' => 'nullable',
        ]);
        $task = Task::whereId($id)->update($validatedData);

        return redirect('/tasks')->with('success', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Запись удалена');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Non routes
     */


    // Set date in queries and return date will passed to view
    public function get_date($date)
    {
        if ($date) {
            // Get picked date from datepicker_init.js
            $this->dt = Carbon::createFromFormat('d.m.Y', $date);
            // Create default value input for #datepicker
            $dt_view = Carbon::parse($this->dt)->format('d.m.Y');
            return $dt_view;
        } else {
            // Get today day
            $this->dt = Carbon::today()->startOfDay();
            // Create default value input #datepicker
            $dt_view = Carbon::parse($this->dt)->format('d.m.Y');
            return $dt_view;
        }
    }

    // Set order in queries
    public function order_by($ord)
    {
        switch ($ord) {
            case 'vendor_code':
                $this->order_by = $ord;
                break;
            default:
                $this->order_by = 'id';
        }
    }
}
