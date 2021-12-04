@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Tipo de Servicios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('tipoServicios.create')}}" class="btn btn-primary btb-sm">Añadir Tipo</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tiposervicio" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Domicilio</th>
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tipoServicios as $tipoServicio)
                            <tr>
                                <td>{{$tipoServicio->id}}</td>
                                <td>{{$tipoServicio->nombre}}</td>
                                <td>{{$tipoServicio->descripción}}</td>
                                <td>
                                    <form action="{{route('tipoServicios.destroy', $tipoServicio)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('tipoServicios.edit', $tipoServicio)}}" class="btn btn-info btn-sm">Editar<a>
                                        @can('editar tipo de servicio')
                                        @endcan
                                        <button class="btn btn-danger btn-sm" tipoServicio="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                        @can('eliminar tipo de servicio')
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#materiales').DataTable();
        } );
    </script> 
@stop