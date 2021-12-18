@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Nota factura</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('facturas.create') }}">Registrar Nota de factura</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="facturas">
                <thead>
                    <tr>
                        <th>Id-Nro de Factura </th>
                        <th>Nro Autorización</th>
                        <th>Fecha de Factura</th>
                        <th>Nit</th>
                        <th>Monto Total</th>
                        <th>Nro Venta</th>
                        @can('crear factura')
                            <th>Acciones</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura as $facturas)
                        <tr>
                            <td>{{ $facturas->id }}</td>
                            <td>{{ $facturas->Nro_aut }}</td>
                            <td>{{ $facturas->Fecha_f }}</td>
                            <td>{{ $facturas->nit }}</td>
                            <td>{{ $facturas->monTotal }}</td>
                            <td>{{ $facturas->Id_venta }}</td>


                            <td>


                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('facturas.edit', $facturas) }}">Editar</a>


                                <form action="{{ route('facturas.destroy', $facturas) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                        onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>


                                </form>
                            </td>

                        </tr>
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
        $('#facturas').DataTable({
            autoWidth: false
        });
    </script>
@endsection
