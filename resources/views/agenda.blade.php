<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Agenda</title>

    <!-- Incluye los estilos de FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.0/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.11.0/main.min.css" rel="stylesheet">
</head>
<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <h1 class="text-white text-xl font-bold">Consultorio del Bienestar</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('doctor') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Pacientes</a>
            <a href=" {{ route('registrarCita') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Agendar cita</a>
            <a href=" {{ route('agenda') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Agenda</a>
            <a href=" {{ route('productos') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Productos</a> 
            <a href=" {{ route('servicios') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Servicios</a> 
            <a href=" {{ route('ventas') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Ventas</a> 
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class=" text-white text-xl hover:text-white ">Cerrar sesión</a>
        </div>
    </header>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <div id="calendar"></div>
    </div>

    <!-- Incluye los scripts de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.11.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            fetch('/info-citas')
                .then(response => response.json())
                .then(events => {
                    console.log(events);
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: [ 'dayGrid' ],
                        initialView: 'dayGridMonth',
                        events: events,
                        eventColor: '#28a745',
                    });

                    calendar.render();
                });
        });
    </script>
</body>
</html>
