@extends('layouts.app')

@section('title')
    Pizarra
@endsection
@section('content')
    <div class="container">
        <p style="margin-left: 30px">Inicio > Pizarra</p>
        <canvas id="pizarra" width="780" height="400"></canvas><p style="float: right; margin-left: 5px; margin-top: 20px">Los circulos azules y rojos son los jugadores, los negros son los balones<br> y los naranjas son los conos. Dicho esto puedes usarlos como mejor lo <br>entiendas :)<br><br>
        Puedes pintar sobre los circulos, ten cuidado no los pierdas.<br><br>
        Acuerdate que siempre puedes borrar las lineas usando el botón de<br>deshacer dibujo, el cual borra la ultima linea dibujada.<br><br>
        El botón de restablecer posiciones devolvera todos los circulos a su<br>posición inicial, asi que ten cuidado al darle ya que perderás la <br>jugada que este dibujada.<br><br>
        Puedes escribir un número encima de cada jugador haciendo doble click <br>encima de él. También puedes escribir texto, pero si es muy largo se <br>verá mal. No le des doble click a jugadores amontonados uno encima<br> de otro ya que vas a tener que ponerle número a todos.</p><br>
        Color del dibujo: <input type="color" id="colorPicker" value="#FFFFFF">
        Grosor del dibujo: <input type="number" id="grosor" min="1" max="10" value="1"><br>
        <div class="boton btn btn-primary" id="movimiento" onclick="activarMovimiento()">Activar Movimiento</div>
        <div class="boton btn btn-primary" id="dibujo" onclick="activarDibujo()">Activar Dibujo</div>
        <div class="boton btn btn-primary" onclick="deshacerMovimiento()">Deshacer dibujo</div>
        <div class="boton btn btn-primary" onclick="restablecerPosiciones()">Restablecer posiciones</div>
        <div class="boton btn btn-primary" onclick="exportarCanvas()">Exportar imagen</div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/ejercicio.js') }}"></script>
@endpush
