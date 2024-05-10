@extends('layouts.app')

@section('title')
    Editar fecha
@endsection
@section('content')
    @if ($fecha->Tipo == 0)
        @php
            $tipo = 'Entrenamiento';
        @endphp
    @elseif($fecha->Tipo == 1)
        @php
            $tipo = 'Partido';
        @endphp
    @endif
    <div class="container">
        <p style="float: right; margin-left: 10px">Inicio > Calendario > {{ $tipo }}</p>
        <div class="container">
            <form action="{{ route('fecha.update', ['id' => $fecha->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                @php
                    $fechaEsp = date('d-m-Y', strtotime($fecha->Dia));
                @endphp

                <h1>Editar {{ $tipo }} {{ $fechaEsp }}</h1>

                @if ($fecha->Tipo == 0)
                    <div class="row">
                        <div class="col">
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
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                @endif

                @if ($fecha->Tipo == 1)
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="dia">Día:</label>
                                <input type="date" class="form-control" id="dia" name="dia"
                                    value="{{ $fecha->Dia }}" required>

                                <label for="inicio">Hora partido:</label>
                                <input type="time" class="form-control" id="inicio" name="inicio"
                                    value="{{ $fecha->Inicio }}" required>

                                <label for="rival">Rival:</label>
                                <input type="text" class="form-control" id="rival" name="rival"
                                    value="{{ $partido->Rival }}" required>
                                <br><br>
                                <h3>Convocatoria</h3>
                                <p>Elige a los 18 jugadores que iran convocados<br>(si hay menos no pasa nada, mínimo 11
                                    jugadores)</p>
                                <ul id="jugadores">
                                    @foreach ($jugadores as $jugador)
                                        <li>{{ $jugador->Dorsal }}, {{ $jugador->Nombre }}, {{ $jugador->Posicion }}</li>
                                    @endforeach
                                </ul>
                                <ul id="seleccionados"></ul>
                            </div>
                            <div class="col">
                                <canvas id="formaciones" width="600" height="500"></canvas>
                                <select id="seleccionarFormacion" onchange="dibujarFormacion()">
                                    <option value="3-5-2">3-5-2</option>
                                    <option value="4-1-2-1-2">4-1-2-1-2</option>
                                    <option value="4-2-3-1">4-2-3-1</option>
                                    <option value="4-3-2-1">4-3-2-1</option>
                                    <option value="4-3-3">4-3-3</option>
                                    <option selected value="4-4-2">4-4-2</option>
                                    <option value="5-4-1">5-4-1</option>
                                </select>
                                <div class="btn btn-info" onclick="crearPDF()">Generar Convocatoria</div>
                            </div>
                        </div>
                    </div>
                @endif
                <table>
                    <tr>
                        <td><input type="submit" class="btn btn-primary" value="Guardar Cambios"></td>
            </form>
            </td>
            <td>
                <form action = "{{ route('fecha.delete', $fecha->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-primary" value="Borrar {{ $tipo }}">
                    <a class="btn btn-primary" href="{{ route('calendario') }}">Volver</a>
                </form>

            </td>
            </tr>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script type="text/javascript" src="{{ URL::asset('js/formacion.js') }}"></script>
    <script>
        var jugadoresSeleccionados = [];
        var canvas2 = document.getElementById("formaciones");
        var frases = [
    "Juego para ser feliz y la gente que valore lo que tenga que valorar.",
    "No hay nada más peligroso que no arriesgarse.",
    "No hay presión cuando haces realidad un sueño.",
    "¡Tu amor me hace fuerte, tu odio me hace imparable!",
    "En el fútbol, ​​la peor ceguera es solo ver el balón.",
    "El fútbol es un juego de errores. Quien cometa el menor error, gana.",
    "Siempre quiero más. Ya sea que se trate de un gol o de ganar un juego, nunca estoy satisfecho.",
    "Todos los buenos atletas cometen errores; los grandes aprenden a cometer ese error solo una vez.",
    "No soy un dios, sólo soy un futbolista.",
    "Cuanto más difícil es la victoria, mayor es la felicidad de ganar.",
    "Aprendí todo sobre la vida con una pelota a mis pies.",
    "El éxito sin honor es el mayor de los fracasos.",
    "El fútbol es simple, pero es difícil jugar de forma simple.",
    "Odio perder y eso te da una determinación extra para trabajar más duro.",
    "La persona que dijo ganar no lo es todo, nunca ganó nada.",
    "Establecer un objetivo no es lo principal. Es decidir cómo lograrlo y seguir con ese plan.",
    "Cada derrota es una victoria en sí misma.",
    "Sigue trabajando incluso cuando nadie está mirando.",
    "Para mí, el fútbol ofrece tantas emociones, un sentimiento diferente todos los días.",
    "En ningún sitio aprendí tanto de mí y de los demás como en una cancha.",
    "La pelota es redonda, el juego dura noventa minutos, y todo lo demás es solo teoría.",
    "En la vida, como en el fútbol, no llegarás lejos a menos que sepas dónde están tus objetivos.",
    "Toma tus victorias, sean las que sean, cuídalas, úsalas, pero no te conformes con ellas."
];

        document.querySelectorAll('#jugadores li').forEach(jugador => {
            jugador.addEventListener('click', () => {
                const jugadorTexto = jugador.textContent.trim();

                if (!jugadoresSeleccionados.includes(jugadorTexto)) {
                    jugadoresSeleccionados.push(jugadorTexto);
                    jugador.classList.add('convocado');
                } else {
                    jugadoresSeleccionados = jugadoresSeleccionados.filter(jugador => jugador !==
                        jugadorTexto);
                    jugador.classList.remove('convocado');
                }
                //console.log(jugadoresSeleccionados);
            });
        });
        const {PDFDocument,StandardFonts,rgb} = PDFLib;
        async function crearPDF() {
            if (jugadoresSeleccionados.length > 10 && jugadoresSeleccionados.length<19) {
                const posicionValor = {
                    'POR': 1,
                    'DEF': 2,
                    'MC': 3,
                    'DEL': 4
                };

                const jugadoresPorPosicion = {
                    'POR': [],
                    'DEF': [],
                    'MC': [],
                    'DEL': []
                };

                jugadoresSeleccionados.sort((a, b) => {
                    //divido en partes el texto
                    const [dorsalA, nombreA, posicionA] = a.split(', ').map(part => part.trim());
                    const [dorsalB, nombreB, posicionB] = b.split(', ').map(part => part.trim());

                    const valorA = posicionValor[posicionA];
                    const valorB = posicionValor[posicionB];
                    if (valorA !== valorB) { //comparo por posición
                        return valorA - valorB;
                    } else {
                        //comparo por dorsal
                        return parseInt(dorsalA) - parseInt(dorsalB);
                    }
                });

                jugadoresSeleccionados.forEach(jugador => {
                    const [dorsal, nombre, posicion] = jugador.split(', ').map(part => part.trim());
                    jugadoresPorPosicion[posicion].push(jugador);
                });

                const pdfDoc = await PDFDocument.create();
                const timesRomanFont = await pdfDoc.embedFont(StandardFonts.TimesRoman);
                const page = pdfDoc.addPage();
                const {
                    width,
                    height
                } = page.getSize();
                const fontSize = 12;

                const canvasDataURL = canvas2.toDataURL(); //pillo el canvas

                const imageBytes = await fetch(canvasDataURL).then(res => res.arrayBuffer());
                const image = await pdfDoc.embedPng(imageBytes);


                const anchoImagen = 200;
                const alturaImagen = 150;
                const imageX = width - anchoImagen -50;
                const imageY = height - alturaImagen -50;

                //pongo la imagen en el pdf
                page.drawImage(image, {
                    x: imageX,
                    y: imageY,
                    width: anchoImagen,
                    height: alturaImagen,
                });

                page.drawText(document.getElementById('seleccionarFormacion').value,{
                    x: imageX,
                    y: imageY-10,
                    size: fontSize,
                    font: timesRomanFont,
                    color: rgb(0, 0, 0),
                });

                let yPosition = height - 4 * fontSize;
                var nombreEquipo = <?php echo isset($equipo->Nombre) ? json_encode($equipo->Nombre, JSON_HEX_TAG) : json_encode(null, JSON_HEX_TAG);?>;
                page.drawText(nombreEquipo, {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 10,
                    font: timesRomanFont,
                    color: rgb(0, 0, 0),
                });
                yPosition -= fontSize * 2;

                var categoria = <?php echo isset($equipo->Categoria) ? json_encode($equipo->Categoria, JSON_HEX_TAG) : json_encode(null, JSON_HEX_TAG); ?>;
                page.drawText(categoria, {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 5,
                    font: timesRomanFont,
                    color: rgb(0, 0, 0),
                });
                yPosition -= fontSize * 2;
                var hora = <?php echo isset($fecha->Inicio) ? json_encode($fecha->Inicio, JSON_HEX_TAG) : json_encode(null, JSON_HEX_TAG); ?>;
                var fecha = <?php echo isset($fechaEsp) ? json_encode($fechaEsp, JSON_HEX_TAG) : json_encode(null, JSON_HEX_TAG); ?>;
                page.drawText(fecha+' '+hora, {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 2,
                    font: timesRomanFont,
                    color: rgb(0, 0, 0),
                });

                yPosition -= fontSize * 2;
                var rival = <?php echo isset($partido->Rival) ? json_encode($partido->Rival, JSON_HEX_TAG) : json_encode(null, JSON_HEX_TAG);?>;
                page.drawText('Rival:'+rival, {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 2,
                    font: timesRomanFont,
                    color: rgb(0, 0, 0),
                });

                yPosition -= fontSize * 2;

                page.drawText('Lista de convocados:', {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 2,
                    font: timesRomanFont,
                    color: rgb(0, 0.53, 0.71),
                });

                yPosition -= fontSize * 2;

                page.drawText('Porteros:', {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 2,
                    font: timesRomanFont,
                    color: rgb(0, 0.53, 0.71),
                });

                yPosition -= fontSize + 6;

                jugadoresPorPosicion['POR'].forEach((jugador, index) => {
                    const listItem =
                        `${jugador}`;
                    page.drawText(listItem, {
                        x: 70,
                        y: yPosition - index * fontSize * 1.5,
                        size: fontSize,
                        font: timesRomanFont,
                        color: rgb(0, 0, 0),
                    });
                });

                yPosition -= (jugadoresPorPosicion['POR'].length * fontSize * 1.5) + 10;

                page.drawText('Defensas:', {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 2,
                    font: timesRomanFont,
                    color: rgb(0, 0.53, 0.71),
                });

                yPosition -= fontSize + 6;

                jugadoresPorPosicion['DEF'].forEach((jugador, index) => {
                    const listItem =
                        `${jugador}`;
                    page.drawText(listItem, {
                        x: 70,
                        y: yPosition - index * fontSize * 1.5,
                        size: fontSize,
                        font: timesRomanFont,
                        color: rgb(0, 0, 0),
                    });
                });

                yPosition -= (jugadoresPorPosicion['DEF'].length * fontSize * 1.5) + 10;

                page.drawText('Mediocentros:', {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 2,
                    font: timesRomanFont,
                    color: rgb(0, 0.53, 0.71),
                });

                yPosition -= fontSize + 6;

                jugadoresPorPosicion['MC'].forEach((jugador, index) => {
                    const listItem =
                        `${jugador}`;
                    page.drawText(listItem, {
                        x: 70,
                        y: yPosition - index * fontSize * 1.5,
                        size: fontSize,
                        font: timesRomanFont,
                        color: rgb(0, 0, 0),
                    });
                });

                yPosition -= (jugadoresPorPosicion['MC'].length * fontSize * 1.5) + 10;

                page.drawText('Delanteros:', {
                    x: 50,
                    y: yPosition,
                    size: fontSize + 2,
                    font: timesRomanFont,
                    color: rgb(0, 0.53, 0.71),
                });

                yPosition -= fontSize + 6;

                jugadoresPorPosicion['DEL'].forEach((jugador, index) => {
                    const listItem =
                        `${jugador}`;
                    page.drawText(listItem, {
                        x: 70,
                        y: yPosition - index * fontSize * 1.5,
                        size: fontSize,
                        font: timesRomanFont,
                        color: rgb(0, 0, 0),
                    });
                });

                yPosition -= (jugadoresPorPosicion['DEL'].length * fontSize * 2.5) + 10;
                var indice = Math.floor(Math.random() * frases.length);
                page.drawText('"'+frases[indice]+'"', {
                    x: 50,
                    y: yPosition,
                    size: fontSize,
                    font: timesRomanFont,
                    color: rgb(0, 0, 0),
                });

                yPosition -= fontSize + 6;
                page.drawText('CoachHub ©', {
                    x: 50,
                    y: yPosition,
                    size: fontSize,
                    font: timesRomanFont,
                    color: rgb(0, 0, 0),
                });

                const pdfBytes = await pdfDoc.save();
                download(pdfBytes, "lista_convocados_"+fecha+".pdf", "application/pdf");
            } else {
                if(jugadoresSeleccionados.length<11){
                    alert('Tiene que haber un mínimo de 11 jugadores para crear una convocatoria');
                }else{
                    alert('Puede haber un máximo de 18 jugadores para crear una convocatoria');
                }

            }

        }


    </script>
@endpush
