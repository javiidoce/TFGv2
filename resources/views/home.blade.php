@extends('layouts.app')

@section('title')
    Inicio
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <!-- Columna izquierda -->
            <div class="col-md-3">
                <div class="container">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Goleadores</th>
                                <th>Nº</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maximos_goleadores as $jugador)
                                <tr>
                                    <td>{{ $jugador->Nombre }}</td>
                                    <td>{{ $jugador->Goles }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br><br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Asistentes</th>
                                <th>Nº</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maximos_asistentes as $jugador)
                                <tr>
                                    <td>{{ $jugador->Nombre }}</td>
                                    <td>{{ $jugador->Asistencias }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Columna central -->
            <div class="col-md-6">
                <div id='calendar'></div>
            </div>

            <!-- Columna derecha -->
            <div class="col-md-3">
                <div class="container">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Amarillas</th>
                                <th>Nº</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($amarillas as $jugador)
                                <tr>
                                    <td>{{ $jugador->Nombre }}</td>
                                    <td>{{ $jugador->Amarillas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br><br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Rojas</th>
                                <th>Nº</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rojas as $jugador)
                                <tr>
                                    <td>{{ $jugador->Nombre }}</td>
                                    <td>{{ $jugador->Rojas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src='fullcalendar/core/locales/es.global.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar')
      const calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        firstDay: 1,
        initialView: 'dayGridMonth',
        events: @json($eventos),
        eventClick: function(info) {
            var id = info.event.id;
            var url ='{{ route("fecha.editar", ["id" => "idJS"]) }}' //en vez de editar podría hacer una vista para que se vea bien la información del partido o entrenamiento
            url = url.replace('idJS',id);
            window.location.href = url ;
        },
      })
      calendar.render()
    })

  </script>
@endpush
