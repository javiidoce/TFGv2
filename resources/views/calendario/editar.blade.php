@extends('layouts.app')

@section('title')
    Editar fecha
@endsection
@section('content')
    @if ($fecha->Tipo == 0)
        @php
            $tipo = 'entrenamiento';
        @endphp
    @elseif($fecha->Tipo == 1)
        @php
            $tipo = 'partido';
        @endphp
    @endif
    <div class="container">
        <p style="float: right; margin-left: 10px">Inicio > Calendario > {{ $tipo }}</p>
        <div class="container">
            <form action="{{ route('fecha.update', ['id' => $fecha->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col">


                        <h1>Editar {{ $tipo }}</h1>

                        @if ($fecha->Tipo == 0)
                            <label for="dia">Día:</label>
                            <input type="date" class="form-control" id="dia" name="dia"
                                value="{{ $fecha->Dia }}" required>

                            <label for="inicio">Hora inicio:</label>
                            <input type="time" class="form-control" id="inicio" name="inicio"
                                value="{{ $fecha->Inicio }}" required>

                            <label for="final">Hora final:</label>
                            <input type="time" class="form-control" id="final" name="final"
                                value="{{ $fecha->Final }}" required>

                            <label for="ejercicios">Ejercicios/notas:</label>
                            <textarea class="form-control" id="ejercicios" name="ejercicios">{{ $entrenamiento->Ejercicios }}</textarea>
                        @endif

                        @if ($fecha->Tipo == 1)
                            <label for="dia">Día:</label>
                            <input type="date" class="form-control" id="dia" name="dia"
                                value="{{ $fecha->Dia }}" required>

                            <label for="inicio">Hora partido:</label>
                            <input type="time" class="form-control" id="inicio" name="inicio"
                                value="{{ $fecha->Inicio }}" required>

                            <label for="rival">Rival:</label>
                            <input type="text" class="form-control" id="rival" name="rival"
                                value="{{ $partido->Rival }}" required>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
        <div class="col">
            <form action = "{{ route('fecha.delete', $fecha->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-primary" value="Borrar {{ $tipo }}">
            </form>
        </div>
    </div>


    </div>
    <div class="col">

    </div>
    </div>

    </div>
    </div>
@endsection
