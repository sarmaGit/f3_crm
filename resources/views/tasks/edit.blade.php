<!-- edit.blade.php -->

@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Изменить запись
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('tasks.update', $task->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control" name="name" value="{{$task->name}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Номер телефона :</label>
                    <input type="text" class="form-control" name="phone_number" value="{{$task->phone_number}}"/>
                </div>
                <div class="form-group">
                    <label for="vendor_code">Производитель: </label>
                    <select name="vendor_id" id="vendor_id">
                        <option value="">Выберите производителя</option>
                        @foreach ($vendors as $vendor)
                            @if($task->vendor_id == $vendor->id)
                                <option value="{{$vendor->id}}" selected>{{$vendor->vendor_name}}</option>
                            @else
                                <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="model">Модель картриджа </label>
                    <input type="text" class="form-control" name="model" value="{{$task->model}}"/>
                </div>

                <button type="submit" class="btn btn-primary">Обновить запись</button>
            </form>
        </div>
    </div>
@endsection
