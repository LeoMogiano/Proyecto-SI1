@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Detalle compra</h1>
@stop

@section('content')


    <div class="card">
        
        <div class="card-body">
            
            <form action="{{ route('compras.update', $compra) }}" method="post" novalidate>
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="costoTotal">Monto Total</label>
                        <input type="text" name="costoTotal" class="form-control"
                            value="{{ old('costoTotal', $compra->costoTotal) }}" readonly>
                        @error('costoTotal')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Fecha_c">Fecha de compra</label>
                        <input type="text" name="Fecha_c" class="form-control"
                            value="{{ old('Fecha_c', $compra->Fecha_c) }}" readonly>
                        @error('Fecha_c')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Id_prov">ID del Proveedor</label>
                        <input type="text" name="Id_prov" class="form-control" value="{{ old('Id_prov', $compra->Id_prov) }}"
                            readonly>
                        @error('Id_prov')
                            <small>*{{ $message }}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>

                <br>

                <a class="btn btn-danger" href="{{ route('compras.index') }}">Volver</a>
            </form>

        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{route('dcompras.show',$compra->id)}}">Agregar Producto</a>
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="compras">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
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
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#compras').DataTable({
            autoWidth: false
        });
    </script>
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
