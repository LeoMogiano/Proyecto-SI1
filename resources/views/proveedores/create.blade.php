@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Registro de Proveedor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('proveedores.store')}}" method="post" novalidate >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nombre del tipo</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" id="nombre">
                        @error('nombre')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="nombre">Ingrese el email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" id="email">
                        @error('email')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                    <div class="form-group col-md-10">
                        <label for="ubicación">Ingrese la ubicación</label>
                        <input type="text" name="ubicación" class="form-control" value="{{old('ubicación')}}" id="ubicación">
                        @error('ubicación')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                    <div class="form-group col-md-10">
                        <label for="nombre">Ingrese la descripción</label>
                        <input type="text" name="tiempoEstimado" class="form-control" value="{{old('tiempoEstimado')}}" id="tiempoEstimado">
                        @error('tiempoEstimado')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                        
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit">Añadir Proveedor</button>
                    <a class="btn btn-danger" href="{{route('proveedores.index')}}">Volver</a>
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