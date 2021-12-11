@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar Datos de Productos</h1>
@stop

@section('content')
<form method="post" action="{{route('productos.update',$producto)}}">
    @csrf
    @method('PATCH')
    <div class="form-group col-md-6">
    <h5>Nombre:</h5>
    <input type="text"  name="nombre" value="{{$producto->nombre}}" class="focus border-primary  form-control">
    @error('nombre')
    <span class="text-danger">{{$message}}</span>
    @enderror
    </div>

        <div class="form-group col-md-3">
        <h5>Color:</h5>
        <input type="text"  name="color" value="{{$producto->color}}" class="focus border-primary  form-control">
        @error('color')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group col-md-3">
        <h5>Precio:</h5>
        <input type="text"  name="precio" value="{{$producto->precio}}" class="focus border-primary  form-control">
        @error('precio')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group col-md-3">
        <h5>Costo:</h5>
        <input type="text"  name="costo" value="{{$producto->costo}}" class="focus border-primary  form-control">
        @error('costo')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group col-md-3">
        <h5>Stock:</h5>
        <input type="text"  name="stock" value="{{$producto->stock}}" class="focus border-primary  form-control">
        @error('stock')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group col-md-3">
        <h5>Categoria:</h5>
        <select name="categoria"  class="focus border-primary  form-control">
            @foreach ($categoria as $categorias)
                @if ($producto->Id_categoria==$categorias->id)
                {{--ZZ <option value="{{$producto->Id_marca}}">{{$producto->Id_marca}}</option> XX --}}
                <option value={{$categorias->id}}>{{$categorias->nombre}}</option>
                @endif
            
            @endforeach
            @foreach ($categoria as $categorias)
                @if ($producto->Id_categoria!=$categorias->id)
                    <option value={{$categorias->id}}>{{$categorias->nombre}}</option>  
                @endif
                
            @endforeach
            
            
        </select>
        </div>

        <div class="form-group col-md-3">
        <h5>Modelo:</h5>
        <select name="modelo"  class="focus border-primary  form-control">
            @foreach ($modelo as $modelos)
                @if ($producto->Id_modelo==$modelos->id)
                {{--ZZ <option value="{{$producto->Id_marca}}">{{$producto->Id_marca}}</option> XX --}}
                <option value={{$modelos->id}}>{{$modelos->nombre}}</option>
                @endif
            
            @endforeach
            @foreach ($modelo as $modelos)
                @if ($producto->Id_modelo!=$modelos->id)
                    <option value={{$modelos->id}}>{{$modelos->nombre}}</option>  
                @endif
                
            @endforeach
            
            
        </select>
        </div>

    
    
    <br>
    <button type="submit"  class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="{{route('productos.index')}}">Volver</a>
    <br>
    <br>
    <br>
</form>
@stop