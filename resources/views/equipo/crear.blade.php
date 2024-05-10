@extends('layouts.app')

@section('title')
    Crear Jugador
@endsection
@section('content')
    <div class="container">
        <p style="float: right">Inicio > Plantilla > Jugador</p>
        <h1>Crear Jugador</h1>
        <form action="{{ route('jugador.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="dorsal">Dorsal:</label>
                        <input type="number" class="form-control" id="dorsal" name="dorsal" required min="1">
                    </div>

                    <script>
                        const dorsalesExistentes = @json($dorsales);

                        const inputDorsal = document.getElementById('dorsal');

                        inputDorsal.addEventListener('change', function(event) {
                            const nuevoDorsal = event.target.value;
                            if (dorsalesExistentes.includes(parseInt(nuevoDorsal))) {
                                alert('El dorsal ingresado ya está en uso. Por favor, elige otro.');
                                inputDorsal.value = '';
                            }
                        });
                    </script>

                    <div class="form-group">
                        <label for="posicion">Posición:</label>
                        <select class="form-control" id="posicion" name="posicion">
                            <option value="POR">Portero</option>
                            <option value="DEF">Defensa</option>
                            <option value="MC">Centrocampista
                            </option>
                            <option value="DEL">Delantero</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="minutos">Añadir minutos:</label>
                                <input type="number" class="form-control" id="minutos" name="minutos" required min="0" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="amarillas">Añadir amarillas:</label>
                                <input type="number" class="form-control" id="amarillas" name="amarillas" required min="0" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="rojas">Añadir rojas:</label>
                                <input type="number" class="form-control" id="rojas" name="rojas" required min="0" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="goles">Añadir goles:</label>
                                <input type="number" class="form-control" id="goles" name="goles" required min="0" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="asistencias">Añadir asistencias:</label>
                                <input type="number" class="form-control" id="asistencias" name="asistencias" required min="0" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="notas">Notas:</label>
                        <textarea class="form-control" id="notas" name="notas"></textarea>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                        <div class="col">
                            <a href="{{route('equipo')}}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </form>

    </div>
    </div>

    </div>
@endsection
