@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar Datos De servicios</h1>
@stop

@section('content')

    <form method="post" action="{{ route('servicios.update', $servicio) }}">
        @csrf
        @method('PATCH')
        <div class="form-group col-md-3">
            <h5>Descripción:</h5>
            <input type="text" name="descripción" value="{{ $servicio->descripción }}"
                class="focus border-primary  form-control" required>
        </div>

        <div class="form-group col-md-3">
            <h5>Precio:</h5>
            <input type="text" name="precio" value="{{ $servicio->precio }}" class="focus border-primary  form-control" required>

        </div>
        <div class="form-group col-md-3">
            <h5>Precio:</h5>
            <input type="text" name="url" value="{{ $servicio->url }}" class="focus border-primary  form-control" required>

        </div>
        <div class="form-group col-md-3">
            <div class="form-group">
                <h5>Nombre del Servicio:</h5>
                <select name="Id_tp" class="focus border-primary  form-control">
                    @foreach ($tservicio as $tservicios)
                        @if ($servicio->Id_tp == $tservicios->id)
                            {{-- ZZ <option value="{{$servicio->Id_marca}}">{{$servicio->Id_marca}}</option> XX --}}
                            <option value={{ $tservicios->id }}>{{ $tservicios->nombre }}</option>
                        @endif

                    @endforeach
                    @foreach ($tservicio as $tservicios)
                        @if ($servicio->Id_tp != $tservicios->id)
                            <option value={{ $tservicios->id }}>{{ $tservicios->nombre }}</option>
                        @endif

                    @endforeach


                </select>
            </div>
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ route('servicios.index') }}">Volver</a>

    </form>
@stop
