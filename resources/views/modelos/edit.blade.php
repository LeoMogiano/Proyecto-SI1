@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar Datos De Modelos</h1>
@stop

@section('content')
<form method="post" action="{{route('modelos.update',$modelo)}}">
    @csrf
    @method('PATCH')
     
    <h5>Nombres:</h5>
    <input type="text"  name="nombre" value="{{$modelo->nombre}}" class="focus border-primary  form-control">
    @error('nombre')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br>
    <div class="form-group">
        <h5>Nombre de la Marca:</h5>
        <select name="marca"  class="focus border-primary  form-control">
            @foreach ($marca as $marcas)
                @if ($modelo->Id_marca==$marcas->id)
                {{--ZZ <option value="{{$modelo->Id_marca}}">{{$modelo->Id_marca}}</option> XX --}}
                <option value={{$marcas->id}}>{{$marcas->nombre}}</option>
                @endif
            
            @endforeach
            @foreach ($marca as $marcas)
                @if ($modelo->Id_marca!=$marcas->id)
                    <option value={{$marcas->id}}>{{$marcas->nombre}}</option>  
                @endif
                
            @endforeach
            
            
        </select>
    </div>

    
    
    <br>
    <button type="submit"  class="btn btn-info">Guardar</button>
    <a class="btn btn-danger" href="{{route('modelos.index')}}">Volver</a>

</form>
@stop