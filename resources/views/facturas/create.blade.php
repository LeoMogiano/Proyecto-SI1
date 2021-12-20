@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Registro de Nota de facturas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('facturas.store') }}" method="post">
                @csrf
                <div class="form-row">


                    <div class="form-group col-md-10">
                        <label for="Nro_aut">Ingrese Nro Autorización</label>
                        <input type="text" name="Nro_aut" class="form-control" value="{{ old('Nro_aut') }}" required>
                        
                    </div>
                    <div class="form-group col-md-10">
                        <label for="Fecha_f">Ingrese Fecha Factura</label>
                        <input type="text" name="Fecha_f" class="form-control" value="{{ old('Fecha_f') }}" id="Fecha_f"
                            required>
                        @error('Fecha_f')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="nit">Ingrese el Nit</label>
                        <input type="text" name="nit" class="form-control" value="{{ old('nit') }}" id="nit" required>
                        @error('nit')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="monTotal">Ingrese el Monto Total</label>
                        <input type="text" name="monTotal" class="form-control" value="{{ old('monTotal') }}"
                            id="monTotal" required>
                        @error('monTotal')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="Id_venta">Ingrese el Nro Venta</label>
                        <input type="text" name="Id_venta" class="form-control" value="{{ old('Id_venta') }}"
                            id="Id_venta" required>
                        @error('Id_venta')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Añadir Nota de factura</button>
                        <a class="btn btn-danger" href="{{ route('facturas.index') }}">Volver</a>
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
