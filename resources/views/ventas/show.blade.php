@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Detalle Venta</h1>
@stop

@section('content')


    <div class="card">

        <div class="card-body">
            @error('Nro_v')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta nota de venta ya está registrada.
                </div>

            @enderror
            <form action="{{ route('ventas.update', $venta) }}" method="post" novalidate>
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="montoTotal">Monto Total</label>
                        <input type="text" name="montoTotal" class="form-control"
                            value="{{ old('montoTotal', $venta->montoTotal) }}" readonly>
                        @error('montoTotal')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Fecha_v">Fecha de Venta</label>
                        <input type="text" name="Fecha_v" class="form-control"
                            value="{{ old('Fecha_v', $venta->Fecha_v) }}" readonly>
                        @error('Fecha_v')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Id_us">ID de Usuario</label>
                        <input type="text" name="Id_us" class="form-control" value="{{ old('Id_us', $venta->Id_us) }}"
                            readonly>
                        @error('Id_us')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>

                <br>

                <a class="btn btn-danger" href="{{ route('ventas.index') }}">Volver</a>
            </form>

        </div>
    </div>
    {{-- PRODUCTOS --}}
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('dventas.show', $venta->id) }}">Agregar Producto</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="ventas">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                        <th>Descuento</th>
                        <th>Categoria</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)


                        @foreach ($productoos as $productoo)
                            <tr>
                                @if ($productoo->producto_id == $producto->id)
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $productoo->cantidad }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $productoo->precio_tot }}</td>
                                    <td>{{ $productoo->descuento }}</td>
                                    @foreach ($categorias as $categoria)
                                        @if ($categoria->id == $producto->Id_categoria)
                                            <td>{{ $categoria->nombre }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($modelos as $modelo)
                                        @if ($modelo->id == $producto->Id_modelo)
                                            <td>{{ $modelo->nombre }}</td>
                                        @endif
                                    @endforeach

                                @endif
                            </tr>
                        @endforeach




                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{-- SERVICIOS --}}
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('dservicios.show', $venta->id) }}">Agregar Servicio</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="ventas">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        @foreach ($dservicios as $dservicio)
                            <tr>
                                @if ($dservicio->servicio_id == $servicio->id)

                                    @foreach ($tservicios as $tservicio)
                                        @if ($tservicio->id == $servicio->Id_tp)
                                            <td>{{ $tservicio->nombre }}</td>
                                        @endif
                                    @endforeach

                                    <td>{{ $dservicio->cantidad }}</td>
                                    <td>{{ $servicio->precio }}</td>
                                    <td>{{ $dservicio->precio_tot }}</td>
                                    <td>{{ $servicio->descripción }}</td>

                                @endif
                            </tr>
                        @endforeach

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#ventas').DataTable({
            autoWidth: false
        });
    </script>
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
