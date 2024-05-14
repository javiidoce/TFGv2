@extends('layouts.app')

@section('title')
    Crear partido
@endsection
@section('content')
    <div class="container">
        <h1>Crear partido</h1>
        <form action="{{ route('partido.store') }}" method="POST">
            @csrf
        <p style="float: right; margin-left: 10px">Inicio > Calendario > Partido</p>
        <label for="dia">Día:</label>
        <input type="date" class="form-control" id="dia" name="dia" required>

        <label for="inicio">Hora partido:</label>
        <input type="time" class="form-control" id="inicio" name="inicio" required>

        <label for="rival">Rival:</label>
        <input type="text" class="form-control" id="rival" name="rival" required><br>
        <button type="submit" class="btn btn-primary">Crear partido</button>
        <a class="btn btn-primary" href="{{route('calendario')}}">Volver</a>
        </form>
    </div>
@endsection
