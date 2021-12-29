@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Nota Venta</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    {{-- @if (session()->has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Error!</strong> {{ session()->get('error') }}
    </div>
    @endif --}}
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('ventas.create') }}">Registrar Nota Venta</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="ventas">
                <thead>
                    <tr>
                        <th>Id </th>
                        {{-- <th>Nro de Venta </th> --}}
                        <th>Monto Total</th>
                        <th>Fecha de Venta</th>
                        <th>Nombre de Usuario</th>

                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($venta as $ventas)
                        <tr>
                            <td>{{ $ventas->id }}</td>
                            {{-- <td>{{$ventas->Nro_v}}</td> --}}
                            <td>{{ $ventas->montoTotal }}</td>
                            <td>{{ $ventas->Fecha_v }}</td>
                            @foreach ($User as $Users)
                                @if ($ventas->Id_us == $Users->id)

                                    <td>{{ $Users->name }}</td>
                                @endif
                            @endforeach

                            <td>


                                <a class="btn btn-primary btn-sm" href="{{ route('ventas.edit', $ventas) }}">Editar</a>


                                <form action="{{ route('ventas.destroy', $ventas) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                        onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>


                                </form> <a class="btn btn-info btn-sm" style="margin-top: 0.35rem"
                                    href="{{ route('ventas.show', $ventas) }}">Detalle Venta</a>
                                <br>
                                <a class="btn btn-success btn-sm" style="margin-top: 0.35rem"
                                    href="{{ route('dventas.edit', $ventas) }}">Generar Factura</a>

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
        $('#ventas').DataTable({
            autoWidth: false
        });
    </script>
@endsection
