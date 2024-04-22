@extends('layouts.app')

@section('title')
    Calendario
@endsection
@section('content')
    <div class="container">
        <p style="float: right; margin-left: 10px">Inicio > Calendario</p>
        <a class="btn btn-primary" href="{{route('entrenamiento.create')}}">Crear entrenamiento</a>
        <a class="btn btn-primary" href="{{route('partido.create')}}">Crear partido</a><br><br>
        <div id='calendar'></div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src='fullcalendar/core/locales/es.global.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar')
      const calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        firstDay: 1,
        initialView: 'dayGridMonth',
        height : 500,
        events: @json($eventos),
        eventClick: function(info) {
            var id = info.event.id;
            var url ='{{ route("fecha.editar", ["id" => "idJS"]) }}'
            url = url.replace('idJS',id);
            window.location.href = url ;
        },
      })
      calendar.render()
    })

  </script>
@endpush