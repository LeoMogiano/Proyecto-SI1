@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar Nota de Compra</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('id')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Esta nota de compra ya está registrada.
      </div>
         
        @enderror 
            <form action="{{route('compras.update', $compra)}}" method="post" >
                @csrf
                @method('put')
                <div class="form-row">
                   
                    <div class="form-group col-md-12" >
                        <label for="costoTotal">Ingrese nuevo Costo Total</label>
                        <input type="text" name="costoTotal" class="form-control" value="{{old('costoTotal', $compra->costoTotal)}}" required>
                        @error('costoTotal')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12" >
                        <label for="Fecha_c">Ingrese nueva Fecha de Compra</label>
                        <input type="text" name="Fecha_c" class="form-control" value="{{old('Fecha_c', $compra->Fecha_c)}}" required>
                        @error('Fecha_c')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div> 
                    {{-- <div class="form-group col-md-12" >
                        <label for="Id_prov">Ingrese nuevo ID de Usuario</label>
                        <input type="text" name="Id_prov" class="form-control" value="{{old('Id_prov', $compra->Id_prov)}}" required>
                        @error('Id_prov')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>  --}}

                    <div class="form-group">
                        <h5>Nombre de la proveedor:</h5>
                        <select name="Id_prov" class="focus border-primary  form-control">
                            @foreach ($proveedor as $proveedors)
                                @if ($compra->Id_prov == $proveedors->id)
                                    {{-- ZZ <option value="{{$compra->Id_prov}}">{{$compra->Id_prov}}</option> XX --}}
                                    <option value={{ $proveedors->id }}>{{ $proveedors->nombre }}</option>
                                @endif
            
                            @endforeach
                            @foreach ($proveedor as $proveedors)
                                @if ($compra->Id_prov != $proveedors->id)
                                    <option value={{ $proveedors->id }}>{{ $proveedors->nombre }}</option>
                                @endif
            
                            @endforeach
            
            
                        </select>
                    </div>
                </div>
                
        <br>


        <button  class="btn btn-primary" type="submit">Actualizar Nota de Compra</button>
        <a class="btn btn-danger" href="{{route('compras.index')}}">Volver</a>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop