<!-- index.blade.php -->

@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">

        <form method="get" action="{{ route('tasks.index')}}">
            <h1>
                Смена
                @csrf
                <input type="text" name="datepicker" id="datepicker" value="{{$dt_view ?? ''}}">
                <button class="btn btn-success" type="submit">Выбрать</button>
            </h1>
        </form>

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td><a href="/tasks/">ID</a></td>
                <td>Имя</td>
                <td>Номер телефона</td>
{{--                <td><a href="http://{{$_SERVER['PHP_SELF']}}?order_by=vendor_code">Производитель</a></td>--}}
                <td><a href="?order_by=vendor_code">Производитель</a></td>
                <td>Модель</td>
                <td colspan="2">Действие</td>
            </tr>
            </thead>
            <tbody>
            <?php

            ?>
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->phone_number}}</td>
{{--                    <td>{{$task->vendor->vendor_name}}</td>--}}
                    <td>{{$task->vendor_name}}</td>
                    <td>{{$task->model}}</td>
                    <td><a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-primary">Изменить</a></td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <a href="{{route('tasks.create')}}"><button class="btn btn-success">Добавить</button></a>
    </div>
    <script src="{{asset('js/manifest.js')}}"></script>
    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
@endsection
