@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Categorias</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    @can('crear categoria')
    <a class="btn btn-primary" href="{{route('categorias.create')}}">Registrar Categoria</a>
    @endcan 
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="categorias">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Nombres</th>
                    @can('crear categoria', Model::class)
                    <th>Acciones</th>  
                    @endcan
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria as $categorias)
                <tr>
                    <td>{{$categorias->id}}</td>
                    <td>{{$categorias->nombre}}</td>
                    <td>
                        @can('crear categoria')
                        <a class="btn btn-primary btn-sm" href="{{route(    'categorias.edit',$categorias)}}">Editar</a>  
                        @endcan
                        
                        <form action="{{route('categorias.destroy',$categorias)}}" method="POST">
                            @csrf
                            @method('delete')
                            @can('crear categoria')
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
        $('#categorias').DataTable({
            autoWidth:false
        });
    </script>
@endsection