<?php

namespace App\Http\Controllers;

use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = Carbon::today()->startOfDay();
////        dd($dt);
//        $dt_view = $dt->format('d.m.Y');
////            dd($dt_view);
        \DB::enableQueryLog();
//        $tasks = \DB::table('tasks')
//            ->join('vendors', 'tasks.vendor_code', '=', 'vendors.id')
//            ->select('tasks.*', 'vendors.vendor_name')
//            ->whereDate('updated_at', '=', $dt)
//            ->get();
        $tasks = Task::with(['vendor'])->whereDate('updated_at', '=', $dt)->get();
//        dd(\DB::getQueryLog());
        return view('tasks.index', compact('tasks'));
    }

    public function select_date(Request $request)
    {
        $dt = Carbon::createFromFormat('d.m.Y', $request->datepicker);
//        $dt_view=$request->datepicker;
//        \DB::enableQueryLog();
//        $tasks = \DB::table('tasks')
//            ->join('vendors', 'tasks.vendor_code', '=', 'vendors.code')
//            ->select('tasks.*', 'vendors.vendor_name')
//            ->whereDate('updated_at', '=', $dt)
//            ->get();
//        dd(\DB::getQueryLog());
//        dd($dt);

        $tasks = Task::with(['vendor'])->whereDate('updated_at', '=', $dt)->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $vendors = \DB::table('vendors')
//            ->select('code', 'vendor_name')
//            ->get()
//        \DB::enableQueryLog();
        $vendors = Vendor::get(['id', 'vendor_name']);
//        dd(\DB::getQueryLog());
        return view('tasks.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[а-яА-Я]{3,20}$/um',
            'phone_number' => 'required|numeric|regex:/^\d{11}$/m',
            'vendor_code' => 'required|integer',
            'model' => 'nullable',
        ]);
        $task = Task::create($validatedData);
        return redirect('/tasks')->with('success', 'Клиент добавлен в очередь');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
//        $vendors = \DB::table('vendors')
//            ->select('code', 'vendor_name')
//            ->get();
        $vendors = Vendor::get(['id', 'vendor_name']);
        return view('tasks.edit', compact('task', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[а-яА-Я]{3,20}$/um',
            'phone_number' => 'required|numeric|regex:/^\d{11}$/m',
            'vendor_code' => 'required|integer',
            'model' => 'nullable',
        ]);
        Task::whereId($id)->update($validatedData);

        return redirect('/tasks')->with('success', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Запись удалена');
    }
}
