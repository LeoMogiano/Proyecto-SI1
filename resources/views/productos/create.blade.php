@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Registrar Producto</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            @error('nombre')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Este producto ya está registrado.
                </div>

            @enderror

            <form method="post" action="{{ route('productos.store') }}">
                @csrf

                <div class="form-group col-md-4">
                    <h5>Nombre:</h5>
                    <input type="text" name="nombre" class="focus border-primary  form-control" required>

                </div>
                <div class="form-group col-md-4">
                    <h5>Color:</h5>
                    <input type="text" name="color" class="focus border-primary  form-control" required>
                    @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <h5>Precio:</h5>
                    <input type="text" name="precio" class="focus border-primary  form-control" required>
                    @error('precio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group col-md-4">
                    <h5>Costo:</h5>
                    <input type="text" name="costo" class="focus border-primary  form-control" required>
                    @error('costo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    <h5>descuento:</h5>
                    <input type="text" name="descuento" class="focus border-primary  form-control" required>
                    @error('descuento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    <h5>URL-Imagen:</h5>
                    <input type="text" name="url" class="focus border-primary  form-control" required>
                    @error('url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    <h5>Stock:</h5>
                    <input type="text" name="stock" class="focus border-primary  form-control" required>
                    @error('stock')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <h5>Categoria:</h5>
                    <select name="categoria" class="focus border-primary  form-control">
                        @foreach ($categoria as $categorias)
                            <option value={{ $categorias->id }}>{{ $categorias->nombre }}</option>
                        @endforeach


                    </select>
                </div>

                <div class="form-group col-md-4">
                    <h5>Modelo:</h5>
                    <select name="modelo" class="focus border-primary  form-control">
                        @foreach ($modelo as $modelos)
                            <option value={{ $modelos->id }}>{{ $modelos->nombre }}</option>
                        @endforeach


                    </select>
                </div>



                <br>

                <div class="<div class=" form-group row">
                    <button class="btn btn-primary " type="submit">Registrar</button>
                    <a class="btn btn-danger" href="{{ route('productos.index') }}">Volver</a>
                </div>


            </form>

        </div>
    </div>
@stop
