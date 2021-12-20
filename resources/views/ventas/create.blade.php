@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Registro de Nota de Ventas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session()->has('error'))

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> {{ session()->get('error') }}


            @endif


            <form action="{{ route('ventas.store') }}" method="post" >
                @csrf
                <div class="form-row">



                    <div class="form-group col-md-10">
                        <label for="Fecha_v">Ingrese el Fecha de Venta</label>
                        <input type="text" name="Fecha_v" class="form-control" value="{{ old('Fecha_v') }}" id="Fecha_v" required>
                        @error('Fecha_v')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="Id_us">Ingrese el ID del Usuario</label>
                        <input type="text" name="Id_us" class="form-control" value="{{ old('Id_us') }}" id="Id_us" required>
                        @error('Id_us')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>


                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Añadir Nota de Venta</button>

                    <a class="btn btn-danger" href="{{ route('ventas.index') }}">Volver</a>
                </div>

            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
