@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar tipo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('tipoServicios.update', $tipoServicio)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nuevo nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('nombre', $tipoServicio->nombre)}}" id="nombre">
                        @error('nombre')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12" >
                        <label for="descripción">Ingrese nueva descripción</label>
                        <input type="text" name="descripción" class="form-control" value="{{old('descripción', $tipoServicio->descripción)}}">
                        @error('descripción')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                </div>
                
        <br>


        <button  class="btn btn-primary" type="submit">Actualizar tipo de servicio</button>
        <a class="btn btn-danger" href="{{route('tipoServicios.index')}}">Volver</a>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop