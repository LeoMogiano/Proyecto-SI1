@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Marcas</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        
        <a class="btn btn-primary" href="{{route('marcas.create')}}">Registrar Marca</a>
        
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="marcas">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Nombres</th>
                   
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($marca as $marcas)
                <tr>
                    <td>{{$marcas->id}}</td>
                    <td>{{$marcas->nombre}}</td>
                    
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route(    'marcas.edit',$marcas)}}">Editar</a>
                        <form action="{{route('marcas.destroy',$marcas)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem" onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>
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
        $('#marcas').DataTable({
            autoWidth:false
        });
    </script>
@endsection