@extends('layouts.app')

@section('title')
    Crear entrenamiento
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('entrenamiento.store') }}" method="POST">
            @csrf
        <p style="float: right; margin-left: 10px">Inicio > Calendario > Entrenamiento</p>
        <label for="dia">Día:</label>
        <input type="date" class="form-control" id="dia" name="dia" required>

        <label for="inicio">Hora inicio:</label>
        <input type="time" class="form-control" id="inicio" name="inicio" required>

        <label for="final">Hora final:</label>
        <input type="time" class="form-control" id="final" name="final" required>

        <label for="ejercicios">Ejercicios/notas:</label>
        <input type="text" class="form-control" id="ejercicios" name="ejercicios"><br>
        <button type="submit" class="btn btn-primary">Crear entrenamiento</button>
        </form>
    </div>
@endsection
