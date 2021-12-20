@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar Factura</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        
            <form action="{{route('facturas.update', $factura)}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                    
                    <div class="form-group col-md-12" >
                        <label for="Nro_aut">Ingrese Nro Autorización</label>
                        <input type="text" name="Nro_aut" class="form-control" value="{{old('Nro_aut', $factura->Nro_aut)}}" required>
                        @error('Nro_aut')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12" >
                        <label for="Fecha_f">Ingrese Fecha de factura</label>
                        <input type="text" name="Fecha_f" class="form-control" value="{{old('Fecha_f', $factura->Fecha_f)}}" required>
                        @error('Fecha_f')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                    <div class="form-group col-md-12" >
                        <label for="nit">Ingrese nit</label>
                        <input type="text" name="nit" class="form-control" value="{{old('nit', $factura->nit)}}" required>
                        @error('nit')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12" >
                        <label for="monTotal">Ingrese Monto Total</label>
                        <input type="text" name="monTotal" class="form-control" value="{{old('monTotal', $factura->monTotal)}}" required>
                        @error('monTotal')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                    <div class="form-group col-md-12" >
                        <label for="Id_venta">Ingrese nuevo ID de Usuario</label>
                        <input type="text" name="Id_venta" class="form-control" value="{{old('Id_venta', $factura->Id_venta)}}" required>
                        @error('Id_venta')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                </div>
                
        <br>


        <button  class="btn btn-primary" type="submit">Actualizar Nota de factura</button>
        <a class="btn btn-danger" href="{{route('facturas.index')}}">Volver</a>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop