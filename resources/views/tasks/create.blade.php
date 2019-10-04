<!-- create.blade.php -->

@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Записать клиента
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
            <form method="post" action="{{ route('tasks.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="phone_number">Номер телефона: </label>
                    <input type="text" class="form-control" name="phone_number"/>
                </div>
                <div class="form-group">
                    <label for="vendor_code">Производитель: </label>
                    <select name="vendor_code" id="vendor_code">
                        <option value="">Выберите производителя</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="model">Модель картриджа </label>
                    <input type="text" class="form-control" name="model"/>
                </div>

                <button type="submit" class="btn btn-primary">Отправить в очередь</button>
            </form>
        </div>
    </div>
@endsection