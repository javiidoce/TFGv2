@extends('layouts.app')

@section('title')
    Crear entrenamiento
@endsection
@section('content')
    <div class="container">
        <p style="float: right; margin-left: 10px">Inicio > Calendario > Entrenamiento</p>
        <div class="row">
            <div class="col">
                <form action="{{ route('entrenamiento.store') }}" method="POST">
                    @csrf
                <label for="dia">Día:</label>
                <input type="date" class="form-control" id="dia" name="dia" required>

                <label for="inicio">Hora inicio:</label>
                <input type="time" class="form-control" id="inicio" name="inicio" required>

                <label for="final">Hora final:</label>
                <input type="time" class="form-control" id="final" name="final" required>

                <label for="ejercicios">Ejercicios/notas:</label>
                <input type="text" class="form-control" id="ejercicios" name="ejercicios"><br>
                <button type="submit" class="btn btn-primary">Crear entrenamiento</button>
                <a class="btn btn-primary" href="{{route('calendario')}}">Volver</a>
            </div>
            <div class="col">
                ¿Repetir cada semana?
                <input type="checkbox" id="repetir" name="repetir"><br>
            </div>
        </div>
    </form>
    </div>
@endsection
