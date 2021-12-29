@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Perfil de Usuario</h1>
@stop

@section('content')
    {{-- @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Este modelo ya está registrado.
        </div>

    @enderror --}}
    <form method="post" action="{{ route('modelos.update', $User) }}">
        @csrf
        @method('PATCH')
    <div class="form-group col-md-3">
        <h5>ID:</h5>
        <input type="text" name="id" value="{{ $User->id }}" class="focus border-primary  form-control" readonly>
    </div>
    <div class="form-group col-md-5">
        <h5>Nombre:</h5>
        <input type="text" name="nombre" value="{{ $User->name }}" class="focus border-primary  form-control" readonly>
    </div>
    <div class="form-group col-md-5">
       
        
        <h5>Email:</h5>
        <input type="text" name="id" value="{{ $User->email }}" class="focus border-primary  form-control" readonly>
    </div>
        
        

        
        {{-- <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ route('modelos.index') }}">Volver</a> --}}

    </form>
@stop
