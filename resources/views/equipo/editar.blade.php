@extends('layouts.app')

@section('title')
    Editar Jugador
@endsection
@section('content')
    <div class="container">
        <p style="float: right">Inicio > Plantilla > Jugador</p>
        <h1>Editar Jugador</h1>
        <form action="{{ route('jugador.update', ['id' => $jugador->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $jugador->Nombre }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dorsal">Dorsal:</label>
                        <input type="number" class="form-control" id="dorsal" name="dorsal"
                            value="{{ $jugador->Dorsal }}" min="1" required>
                    </div>

                    <script>
                        const dorsalOriginal = @json($jugador->Dorsal);
                        const dorsalesExistentes = @json($dorsales);

                        const inputDorsal = document.getElementById('dorsal');

                        inputDorsal.addEventListener('change', function(event) {
                            const nuevoDorsal = event.target.value;
                            if (dorsalesExistentes.includes(parseInt(nuevoDorsal)) && nuevoDorsal !== dorsalOriginal) {
                                alert('El dorsal ingresado ya está en uso. Por favor, elige otro.');
                                inputDorsal.value = dorsalOriginal;
                            }
                        });
                    </script>


                    <div class="form-group">
                        <label for="posicion">Posición:</label>
                        <select class="form-control" id="posicion" name="posicion" required>
                            <option value="POR" {{ $jugador->Posicion == 'POR' ? 'selected' : '' }}>Portero</option>
                            <option value="DEF" {{ $jugador->Posicion == 'DEF' ? 'selected' : '' }}>Defensa</option>
                            <option value="MC" {{ $jugador->Posicion == 'MC' ? 'selected' : '' }}>Centrocampista
                            </option>
                            <option value="DEL" {{ $jugador->Posicion == 'DEL' ? 'selected' : '' }}>Delantero</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="añadirMinutos">Añadir minutos:</label>
                                <input type="number" class="form-control" id="añadirMinutos" name="añadirMinutos" min="0">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="quitarMinutos">Quitar minutos:</label>
                                <input type="number" class="form-control" id="quitarMinutos" name="quitarMinutos" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="añadirAmarillas">Añadir amarillas:</label>
                                <input type="number" class="form-control" id="añadirAmarillas" name="añadirAmarillas" min="0">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="quitarAmarillas">Quitar amarillas:</label>
                                <input type="number" class="form-control" id="quitarAmarillas" name="quitarAmarillas" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="añadirRojas">Añadir rojas:</label>
                                <input type="number" class="form-control" id="añadirRojas" name="añadirRojas" min="0">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="quitarRojas">Quitar rojas:</label>
                                <input type="number" class="form-control" id="quitarRojas" name="quitarRojas" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="añadirGoles">Añadir goles:</label>
                                <input type="number" class="form-control" id="añadirGoles" name="añadirGoles" min="0">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="quitarGoles">Quitar goles:</label>
                                <input type="number" class="form-control" id="quitarGoles" name="quitarGoles" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="añadirAsistencias">Añadir asistencias:</label>
                                <input type="number" class="form-control" id="añadirAsistencias" name="añadirAsistencias" min="0">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="quitarAsistencias">Quitar asistencias:</label>
                                <input type="number" class="form-control" id="quitarAsistencias"
                                    name="quitarAsistencias" min="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="notas">Notas:</label>
                        <textarea class="form-control" id="notas" name="notas">{{ $jugador->Notas }}</textarea>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </form>
                        </div>
                        <div class="col">
                            <form action = "{{route('jugador.delete', $jugador->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="submit" class="btn btn-primary" value="Borrar jugador">
                            </form>
                        </div>
                    </div>


    </div>
    </div>

    </div>
@endsection
