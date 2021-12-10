@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Modelos</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    @can('gestionar usuario')
    <a class="btn btn-primary" href="{{route('modelos.create')}}">Registrar Modelo</a>
    @endcan 
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="modelos">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Nombres</th>
                    <th >Nombre de la Marca</th>
                    @can('crear modelo', Model::class)
                    <th>Acciones</th>  
                    @endcan
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($modelo as $modelos)
                <tr>
                    <td>{{$modelos->id}}</td>
                    <td>{{$modelos->nombre}}</td>
                    @foreach ($marca as $marcas)
                        @if ($modelos->Id_marca==$marcas->id)

                        <td>{{$marcas->nombre}}</td>   
                        @endif
                    @endforeach
                    
                    <td>
                        @can('gestionar usuario')
                        <a class="btn btn-primary btn-sm" href="{{route(    'modelos.edit',$modelos)}}">Editar</a>  
                        @endcan
                        
                        <form action="{{route('modelos.destroy',$modelos)}}" method="POST">
                            @csrf
                            @method('delete')
                            @can('gestionar usuario')
                            <button style="margin-top: 0.35rem"type="submit" class="btn btn-danger btn-sm" >Eliminar</button> 
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
        $('#modelos').DataTable({
            autoWidth:false
        });
    </script>
@endsection