@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Registro de Tipo de Servicios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Este tipo de servicio ya está registrado.
      </div>
         
        @enderror
            <form action="{{route('tipoServicios.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nombre del tipo</label>
                        <input type="text" name="nombre" class="form-control"  value="{{old('nombre')}}" id="nombre" required>
                        
                    </div>

                   

                    <div class="form-group col-md-10">
                        <label for="nombre">Ingrese la descripción</label>
                        <input type="text" name="descripción" class="form-control"  value="{{old('descripción')}}" id="descripción" required>
                        @error('descripción')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                
           
                    
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir tipo</button>
                    <a class="btn btn-danger" href="{{route('tipoServicios.index')}}">Volver</a>
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