@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Registrar Producto</h1>
@stop

@section('content')


    {{-- @if (session()->has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Error!</strong> {{ session()->get('error') }}
    </div>
    @endif
 --}}
    <div class="card">

        <div class="card-body">

            <form method="post" action="{{ route('dcompras.store') }}">
                @csrf

                <div class="form-group col-md-3">
                    <h5>Seleccionar Producto:</h5>
                    <select name="producto_id" class="focus border-primary  form-control">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach

                    </select>
                </div>

                <input type="text" name="compra_id" value="{{ $compra_id }}" class="focus border-primary  form-control"
                    hidden>

                <div class="form-group col-md-3">
                    <h5>Cantidad:</h5>
                    <input type="text" name="cantidad" class="focus border-primary  form-control" required>

                </div>
               {{--  <h5>Descuento(Dejar en blanco si no aplica):</h5>
                <div class="form-group d-flex col-md-1">

                    <input type="text" name="descuento" class="focus border-primary  form-control">
                    <h2>%</h2>

                </div> --}}

                <br>
                <button class="btn btn-primary" type="submit">Registrar</button>
                <a class="btn btn-danger" href="{{ route('compras.show', $compra_id) }}">Volver</a>
                {{-- return redirect()->route('compras.show',$request->compra_id); --}}
            </form>

        </div>
    </div>
@stop
