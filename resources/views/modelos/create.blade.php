@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
<h1>Registrar Modelo</h1>
@stop

@section('content')
<div class="card">
    
    <div class="card-body">      
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Este modelo ya está registrado.
      </div>
         
        @enderror  
        <form method="post" action="{{route('modelos.store')}}" >
        @csrf
        
        <h5>Nombre:</h5>
        <input type="text"  name="nombre" class="focus border-primary  form-control" required>
        

        <div class="form-group">
            <h5>Nombre de la Marca:</h5>
            <select name="marca"  class="focus border-primary  form-control">
                @foreach ($marca as $marcas)
                    <option value={{$marcas->id}}>{{$marcas->nombre}}</option>
                @endforeach
                
                
            </select>
        </div>

            
        
        <br>
        <button  class="btn btn-primary" type="submit">Registrar</button>
        <a class="btn btn-danger" href="{{route('modelos.index')}}">Volver</a>
        </form> 
       
    </div>
</div>  
@stop