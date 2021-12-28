@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Registro de Nota de Compras</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @error('id')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta nota de compra ya está registrada.
                </div>

            @enderror
            <form action="{{ route('compras.store') }}" method="post">
                @csrf
                <div class="form">
                    {{-- <div class="form-group col-md-6">
                        <label for="Nro_c">Ingrese el Nro de Compra</label>
                        <input type="text" name="Nro_c" class="form-control" value="C" id="Nro_c    ">
                        
                    </div> --}}

                    {{-- <div class="form-group col-md-10">
                        <label for="costoTotal">Ingrese el Costo Total</label>
                        <input type="text" name="costoTotal" class="form-control" value="{{old('costoTotal')}}" id="costoTotal" required>
                        @error('costoTotal')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> --}}
                    <div class="form-group col-md-4">
                        <label for="Fecha_c">Ingrese el Fecha de Compra</label>
                        <input type="text" name="Fecha_c" class="form-control" value="{{ old('Fecha_c') }}"
                            id="datetimepicker" autocomplete="off" required>
                        @error('Fecha_c')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    {{-- <div class="form-group col-md-10">
                        <label for="Id_prov">Ingrese el ID del Proveedor </label>
                        <input type="text" name="Id_prov" class="form-control" value="{{old('Id_prov')}}" id="Id_prov" required>
                        @error('Id_prov')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> --}}

                    <div class="form-group col-md-3">
                        <label for="Id_prov">Ingrese el ID del Proveedor </label>
                        <select name="Id_prov" class="focus border-primary  form-control">
                            @foreach ($proveedor as $proveedors)
                                <option value={{ $proveedors->id }}>{{ $proveedors->nombre }}</option>
                            @endforeach


                        </select>
                    </div>


                    <div class="form-group" style="padding-left: 0.35rem; padding-top: 0.67rem"  >
                        <button class="btn btn-primary" type="submit">Añadir Nota de compra</button>
                        <a class="btn btn-danger" href="{{ route('compras.index') }}">Volver</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('datetimepicker/jquery.datetimepicker.css') }}">
@stop

@section('js')
    <script src="{{ asset('datetimepicker/jquery.js') }}"></script>
    <script src="{{ asset('datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            jQuery('#datetimepicker').datetimepicker();
        });
    </script>
@stop
