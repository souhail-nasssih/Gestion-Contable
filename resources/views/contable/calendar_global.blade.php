@extends('layouts.contable.master')

@section('content')
    <!-- Contenu spécifique à votre vue, y compris l'affichage du calendrier -->
    <div id="calendar"></div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '{!! route('calendar.tasks') !!}', // Endpoint pour récupérer les événements (tâches)
                eventClick: function(info) {
                    var clientId = info.event.extendedProps.client_id; // Récupérer l'ID du client associé
                    var clientUrl = "{{ url('clients/profile/') }}" + "/" + clientId; // Construire l'URL vers la page du client
                    window.location.href = clientUrl; // Rediriger vers la page du client
                }
                // Autres options de configuration du calendrier
            });
            calendar.render();
        });
    </script>
@endsection
