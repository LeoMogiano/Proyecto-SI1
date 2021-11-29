@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Registrar Categoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">        
        <form method="post" action="{{route('categorias.store')}}" >
        @csrf
        
        <h5>Nombre:</h5>
        <input type="text"  name="nombre" class="focus border-primary  form-control">
        @error('nombre')
        <span class="text-danger">{{$message}}</span>
        @enderror
            
        
        <br>
        <button  class="btn btn-primary" type="submit">Registrar</button>
        <a class="btn btn-danger" href="{{route('categorias.index')}}">Volver</a>
        </form> 
       
    </div>
</div>  
@stop