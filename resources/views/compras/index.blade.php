@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Nota Compra</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    
    <a class="btn btn-primary" href="{{route('compras.create')}}">Registrar Nota de Compra</a>
   
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="compras">
            <thead>
                <tr>
                    <th >Id-Nro de Compra </th>
                    {{-- <th>Nro de Compra </th>  --}}
                    <th >Costo Total</th> 
                    <th>Fecha de Compra</th> 
                    <th>Nombre de Proveedor</th>
                    @can('crear compra')               
                    <th>Acciones</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($compra as $compras)
                <tr>
                    <td>{{$compras->id}}</td>
                    {{-- <td>{{$compras->Nro_c}}</td> --}}
                    <td>{{$compras->costoTotal}}</td>
                    <td>{{$compras->Fecha_c}}</td>                   
                    @foreach ($proveedor as $proveedors)
                        @if ($compras->Id_prov==$proveedors->id)

                        <td>{{$proveedors->nombre}}</td>   
                        @endif
                    @endforeach
                
                    <td>
                        
                        
                        <a class="btn btn-primary btn-sm" href="{{route(    'compras.edit',$compras)}}">Editar</a>  
                       
                        
                        <form action="{{route('compras.destroy',$compras)}}" method="POST">
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
        $('#compras').DataTable({
            autoWidth:false
        });
    </script>
@endsection