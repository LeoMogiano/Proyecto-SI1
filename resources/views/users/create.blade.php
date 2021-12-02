@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Registrar Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('users.store')}}" method="post" novalidate >
                @csrf
                <label for="name">Ingrese el nombre de usuario</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="password">Ingrese la contraseña</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>


                <div>
                    <label for="roles">Seleccione un rol</label>
                    <select name="roles" id="select-roles" class="form-control" onchange="habilitar()" >
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                    </select>
                    @error('roles')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                    <br>
                </div>

                {{-- <div>
                    <label for="mecanicos">Seleccione un mecánico</label>
                    <select name="mecanicos" class="form-control" id="select-mecanico" disabled="" onchange="elegirE()">
                        <option value=0 >Seleccione un trabajador</option>
                            @foreach ($mecanicos as $mecanico)
                                <option value="{{ $mecanico->id }}">{{ $mecanico->nombre}}</option>
                            @endforeach
                    </select>
                    @error('mecanicos')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div> --}}
                <br>

                <button  class="btn btn-danger btn-sm" type="submit">Crear Usuario</button>
            </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');
    function habilitar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }
    function cargar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }
    /* function elegirE(){
        if(odontologos.value > 0){
            odontologos.disabled = false
        }
    } */
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop