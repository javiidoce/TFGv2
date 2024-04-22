@extends('layouts.app')

@section('title')
    Plantilla
@endsection
@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('jugador.crear') }}">Crear jugador</a>

        <p style="float: right">Inicio > Plantilla</p>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Posición</th>
                    <th scope="col">Dorsal</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Minutos</th>
                    <th scope="col">Goles</th>
                    <th scope="col">Asistencias</th>
                    <th scope="col">Amarillas</th>
                    <th scope="col">Rojas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jugadores as $jugador)
                    <tr>
                        <td>{{ $jugador->Posicion }}</td>
                        <td>{{ $jugador->Dorsal }}</td>
                        <td><a id="editarJugador" href="{{ route('jugador.editar', ['id' => $jugador->id]) }}">{{ $jugador->Nombre }}</a></td>
                        <td>{{ $jugador->Minutos }}</td>
                        <td>{{ $jugador->Goles }}</td>
                        <td>{{ $jugador->Asistencias }}</td>
                        <td>{{ $jugador->Amarillas }}</td>
                        <td>{{ $jugador->Rojas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>(Si quieres editar a algun jugador, haz click sobre su nombre)</p>
    </div>
@endsection
