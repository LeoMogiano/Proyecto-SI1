@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Lista Productos</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
  
    <a class="btn btn-primary" href="{{route('productos.create')}}">Registrar Producto</a>
  
    
    
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="productos">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Nombres</th>
                    <th >Colores</th>
                    <th >Precios</th>
                    <th >Costos</th>
                    <th>Stock</th>
                    <th>Imagen</th> 
                    <th >Categorias</th>
                    <th >Modelos</th>     
                    <th>Acciones</th>  
                    
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($producto as $productos)
                <tr>
                    <td>{{$productos->id}}</td>
                    <td>{{$productos->nombre}}</td>
                    <td>{{$productos->color}}</td>
                    <td>{{$productos->precio}}</td>
                    <td>{{$productos->costo}}</td>
                    <td>{{$productos->stock}}</td>
                    <td><img src="{{ $productos->url }}" alt="xd" width="75px"></td>
                    @foreach ($categoria as $categorias)
                        @if ($productos->Id_categoria==$categorias->id)

                        <td>{{$categorias->nombre}}</td>   
                        @endif
                    @endforeach

                    @foreach ($modelo as $modelos)
                        @if ($productos->Id_modelo==$modelos->id)

                        <td>{{$modelos->nombre}}</td>   
                        @endif
                    @endforeach
                    
                    <td>
                       
                        {{-- <a class="btn btn-primary" href="">solicitar Producto</a> --}}
                          
                        
                        <a class="btn btn-primary btn-sm" href="{{route(    'productos.edit',$productos)}}">Editar</a>  
                        <form action="{{route('productos.destroy',$productos)}}" method="POST">
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
        $('#productos').DataTable({
            autoWidth:false
        });
    </script>
@endsection