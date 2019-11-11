<!-- index.blade.php -->

@extends('layout')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Имя</td>
            <td>Производитель</td>
            <td>Модель</td>
            <td>Будет заправлен в ___</td>
        </tr>
        </thead>
        <tbody id="table_content">
        </tbody>
    </table>
    <script src="{{asset('js/manifest.js')}}"></script>
    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
@endsection
