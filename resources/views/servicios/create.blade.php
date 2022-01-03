@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
<h1>Registrar Servicio</h1>
@stop

@section('content')
<div class="card">
    
    <div class="card-body">      
         
        <form method="post" action="{{route('servicios.store')}}" >
        @csrf
        <div class="form-group col-md-3" >
        <h5>Descripción:</h5>
        <input type="text"  name="descripción" class="focus border-primary  form-control" required>
        </div>
        <div class="form-group col-md-3" >
            <h5>URL-Imagen:</h5>
            <input type="text"  name="url" class="focus border-primary  form-control" required>   
        </div>
        <div class="form-group col-md-3" >
            <h5>Precio:</h5>
            <input type="text"  name="precio" class="focus border-primary  form-control" required>   
        </div>

        <div class="form-group col-md-4">
            <h5>Nombre del Servicio:</h5>
            <select name="Id_tp"  class="focus border-primary  form-control">
                @foreach ($tservicio as $tservicios)
                    <option value={{$tservicios->id}}>{{$tservicios->nombre}}</option>
                @endforeach
                
                
            </select>
        </div>

            
        
        <br>
        <button  class="btn btn-primary" type="submit">Registrar</button>
        <a class="btn btn-danger" href="{{route('servicios.index')}}">Volver</a>
        </form> 
       
    </div>
</div>  
@stop