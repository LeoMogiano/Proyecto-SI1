@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Proveedores</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('proveedores.create')}}">Registrar Proveedor</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="tipoServicios">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Ubicaciones</th>
                    <th>Descripciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedors)
                            <tr>
                                <td>{{$proveedors->id}}</td>
                                <td>{{$proveedors->nombre}}</td>
                                <td>{{$proveedors->email}}</td>
                                <td>{{$proveedors->ubicación}}</td>
                                <td>{{$proveedors->tiempoEstimado}}</td>
                                <td>
                                    <a href="{{route('proveedores.edit', $proveedors)}}" class="btn btn-primary btn-sm">Editar<a>
                                        @can('editar tipo de servicio')
                                        @endcan
                                    <form action="{{route('proveedores.destroy', $proveedors)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                        <button class="btn btn-danger btn-sm"style="margin-top: 0.35rem" tipoServicio="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
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

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#tipoServicios').DataTable({
            autoWidth:false
        });
    </script>
@endsection