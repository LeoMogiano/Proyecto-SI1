@extends('adminlte::page')

 @section('title', 'Dashboard')

@section('content_header')
    <h1>Menu de Inicio</h1>
@stop

@section('content')
    <p>Bienvenido al panel de administrador.</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="asset('js/app.js')"></script>
@stop