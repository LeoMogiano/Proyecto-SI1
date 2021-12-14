@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')

<div class="card">
       
    <div class="card-body">
        
            <form action="{{route('proveedores.update',$proveedores)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nuevo nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('nombre', $proveedores->nombre)}}" >
                        
                    </div>
                    @error('nombre')
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡Error!</strong> Este nombre ya está registrado.
                  </div>
                     
                    @enderror

                    
                    <div class="form-group col-md-6" >
                        <label for="email">Ingrese nuevo email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email', $proveedores->email)}}">
                        @error('email')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 

                    <div class="form-group col-md-6" >
                        <label for="email">Ingrese nuevo telefono</label>
                        <input type="text" name="telefono" class="form-control" value="{{old('telefono', $proveedores->telefono)}}">
                        @error('telefono')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 


                    <div class="form-group col-md-12" >
                        <label for="ubicación">Ingrese nueva ubicación</label>
                        <input type="text" name="ubicación" class="form-control" value="{{old('ubicación', $proveedores->ubicación)}}">
                        @error('ubicación')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                    <div class="form-group col-md-12" >
                        <label for="tiempoEstimado">Ingrese nueva descripción</label>
                        <input type="text" name="tiempoEstimado" class="form-control" value="{{old('tiempoEstimado', $proveedores->tiempoEstimado)}}">
                        @error('tiempoEstimado')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                </div>
               
        <br>


        <button  class="btn btn-primary" type="submit">Actualizar Proveedor</button>
        <a class="btn btn-danger" href="{{route('proveedores.index')}}">Volver</a>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop