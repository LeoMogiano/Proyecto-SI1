@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Perfil de Usuario</h1>
@stop

@section('content')
    

    @if (session()->has('success'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Existoso!</strong> {{ session()->get('success') }}
        </div>
    @endif
    
    @if (session()->has('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> {{ session()->get('error') }}
        </div>
    @endif

    @if (session()->has('errorp'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> {{ session()->get('errorp') }}
        </div>
    @endif

    <form method="post" action="{{ route('perfil.update', $User) }}" id="change_password_form">
        @csrf
        @method('PATCH')

        <div class="form-group col-md-5">
            <h5>Usuario:</h5>
            <input type="text" name="id" value="{{ $User->name }}" class="focus border-primary  form-control"
                id="old_password" readonly>

        </div>

        <div class="form-group col-md-5">
            <h5>Antigua Contraseña:</h5>
            <input type="password" name="old_password" class="focus border-primary  form-control" id="old_password" required>
            {{-- @if ($errors->any('old_password'))
                <span class="text-danger">{{ $errors->first('old_password') }}</span>
            @endif --}}
        </div>

        <div class="form-group col-md-5">
            <h5>Nueva Contraseña:</h5>
            <input type="password" name="new_password" class="focus border-primary  form-control" id="new_password" required>
            {{-- @if ($errors->any('new_password'))
                <span class="text-danger">{{ $errors->first('new_password') }}</span>
            @endif --}}
        </div>
        <div class="form-group col-md-5">

            <h5>Confirma Contraseña:</h5>
            <input type="password" name="confirm_password" class="focus border-primary  form-control" id="confirm_password"
                required>
            {{-- @if ($errors->any('confirm_password'))
                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
            @endif --}}

        </div>
        <div class="form-group col-md-5">
            <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>

        </div>
        {{-- <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ route('modelos.index') }}">Volver</a> --}}

    </form>
@stop
