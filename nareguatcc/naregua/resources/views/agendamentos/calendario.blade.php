<x-app-layout>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Calendário de Agendamentos</h2>

        <div id="calendar"></div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'pt-br',
                headerToolbar: {
                    start: 'title',
                    center: '',
                    end: 'today prev,next'
                },
                events: '/api/calendario-eventos',
                height: 'auto'
            });

            calendar.render();
        });
    </script>
</x-app-layout>
