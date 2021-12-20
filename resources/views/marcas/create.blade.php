@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
<h1>Registrar Marcas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">   
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Esta marca ya está registrada.
      </div>
         
        @enderror      
        <form method="post" action="{{route('marcas.store')}}" >
        @csrf
        
        <h5>Nombre:</h5>
        <input type="text"  name="nombre" class="focus border-primary  form-control" required>
        
            
        
        <br>
        <button  class="btn btn-primary" type="submit">Registrar</button>
        <a class="btn btn-danger" href="{{route('marcas.index')}}">Volver</a>
        </form> 
       
    </div>
</div>  
@stop