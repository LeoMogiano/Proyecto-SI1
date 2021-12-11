@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
<h1>Registrar Producto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">        
        <form method="post" action="{{route('productos.store')}}" >
        @csrf
        <div class="form-group col-md-6">
        <h5>Nombre:</h5>
        <input type="text"  name="nombre" class="focus border-primary  form-control">
        @error('nombre')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group col-md-3">
        <h5>Color:</h5>
        <input type="text"  name="color" class="focus border-primary  form-control">
        @error('color')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group col-md-3">
        <h5>Precio:</h5>
        <input type="text"  name="precio" class="focus border-primary  form-control">
        @error('precio')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group col-md-3">
        <h5>Costo:</h5>
        <input type="text"  name="costo" class="focus border-primary  form-control">
        @error('costo')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <h5>Stock:</h5>
        <input type="text"  name="stock" class="focus border-primary  form-control">
        @error('stock')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group col-md-3">
            <h5>Categoria:</h5>
            <select name="categoria"  class="focus border-primary  form-control">
                @foreach ($categoria as $categorias)
                    <option value={{$categorias->id}}>{{$categorias->nombre}}</option>
                @endforeach
                
                
            </select>
            <br>
            <h5>Modelo:</h5>
            <select name="modelo"  class="focus border-primary  form-control">
                @foreach ($modelo as $modelos)
                    <option value={{$modelos->id}}>{{$modelos->nombre}}</option>
                @endforeach
                
                
            </select>
        </div>

            
        
        <br>
        <button  class="btn btn-primary" type="submit">Registrar</button>
        <a class="btn btn-danger" href="{{route('productos.index')}}">Volver</a>
        </form> 
       
    </div>
</div>  
@stop