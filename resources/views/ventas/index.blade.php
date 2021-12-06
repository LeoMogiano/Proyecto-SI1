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
<div class="card">
    <div class="card-header">
    @can('crear venta')
    <a class="btn btn-primary" href="{{route('ventas.create')}}">Registrar Nota Venta</a>
    @endcan 
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="ventas">
            <thead>
                <tr>
                    <th >Id </th>
                    <th>Nro de Venta </th> 
                    <th >Monto Total</th> 
                    <th>Fecha de Venta</th> 
                    <th>ID de Usuario</th>
                    @can('crear venta')               
                    <th>Acciones</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($venta as $ventas)
                <tr>
                    <td>{{$ventas->id}}</td>
                    <td>{{$ventas->Nro_v}}</td>
                    <td>{{$ventas->montoTotal}}</td>
                    <td>{{$ventas->Fecha_v}}</td>                   
                    <td>{{$ventas->Id_us}}</td>
                    @can('crear venta')
                    <td> 
                        
                @can('crear venta')
                        <a class="btn btn-primary btn-sm" href="{{route(    'ventas.edit',$ventas)}}">Editar</a>  
                        @endcan
                        
                        <form action="{{route('ventas.destroy',$ventas)}}" method="POST">
                            @csrf
                            @method('delete')
                            @can('crear venta')
                            <button style="margin-top: 0.35rem"type="submit" class="btn btn-danger btn-sm" >Eliminar</button> 
                            @endcan
                            
                        </form>
                    </td>
                @endcan
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
            autoWidth:false
        });
    </script>
@endsection