@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar Nota de Venta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        
            <form action="{{route('ventas.update', $venta)}}" method="post" >
                @csrf
                @method('put')
                <div class="form-row">
                    {{-- <div class="form-group col-md-6">
                        <label for="Nro_v">Ingrese nuevo Nro de Venta</label>
                        <input type="text" name="Nro_v" class="form-control" value="{{old('Nro_v', $venta->Nro_v)}}" id="Nro_v">
                        
                    </div> --}}
                    <div class="form-group col-md-12" >
                        <label for="montoTotal">Ingrese nuevo Monto Total</label>
                        <input type="text" name="montoTotal" class="form-control" value="{{old('montoTotal', $venta->montoTotal)}}" required>
                        @error('montoTotal')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12" >
                        <label for="Fecha_v">Ingrese nueva Fecha de Venta</label>
                        <input type="text" name="Fecha_v" class="form-control" value="{{old('Fecha_v', $venta->Fecha_v)}}" required>
                        @error('Fecha_v')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                    <div class="form-group col-md-12" >
                        <label for="Id_us">Ingrese nuevo ID de Usuario</label>
                        <input type="text" name="Id_us" class="form-control" value="{{old('Id_us', $venta->Id_us)}}" required>
                        @error('Id_us')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                </div>
                
        <br>


        <button  class="btn btn-primary" type="submit">Actualizar Nota de Venta</button>
        <a class="btn btn-danger" href="{{route('ventas.index')}}">Volver</a>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop