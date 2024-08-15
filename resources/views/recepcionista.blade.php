<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FullCalendar CSS and JS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
    <!-- Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>Bienvenida recepcionista</title>
    <style>
        #calendar {
            background-color: white;
            max-width: 100%;
            margin: 0 auto;
        }

        #modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #modal .modal-content {
            background-color: white;
            border-radius: 0.5rem;
            padding: 1rem;
            width: 90%;
            max-width: 500px;
            max-height: 90%;
            overflow-y: auto;
        }
    </style>
</head>
<body style="background-image: url('{{ asset('img/fondo.png') }}'); background-size: cover; background-position: center; background-attachment: scroll; margin: 0; padding: 0;">
    <header class="flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <button
                class="w-full flex justify-center py-2 px-2 border border-transparent text-xl font-medium rounded-md text-white"
                onclick="location.href='/'">
                Cerrar sesión
            </button></div>
    </header>
    <div class="bg-colorgob4 p-2 text-center text-gray-700">
        <a href="/recepcionista" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Agenda</a>
        <a href="/verServicios" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Servicios</a>
        <a href="/verPacientes" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Pacientes</a>
        <a href="/Productos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
    </div>

    <div class="flex h-screen overflow-hidden justify-center">
        <!-- Calendario -->
        <div class="w-4/5 p-6 overflow-auto " style="margin-top: 10px;">
            <div id='calendar'></div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center" >
        <div class="modal-content bg-white border border-black p-6 w-1/3 relative">
            <button id="close-modal" class="absolute top-2 right-2 text-gray-700 hover:text-gray-900">&times;</button>
            <h2 class="text-2xl font-bold mb-4 flex justify-center">Agendar Cita</h2>

            @if (isset($pacientes) && isset($servicios))
                <form id="appointment-form" method="POST" action="{{ route('recepcionista.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="patient-name" class="block text-sm font-medium text-gray-700">Paciente</label>
                        <select id="patient-name" name="id_paciente"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md select2">
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="appointment-reason" class="block text-sm font-medium text-gray-700">Motivo de la
                            cita</label>
                        <input type="text" id="motivos" name="motivos"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="service-type" class="block text-sm font-medium text-gray-700">Tipo de
                            servicio</label>
                        <select id="service-type" name="id_servicio"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md select2">
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="selected-date" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="text" id="selected-date" name="fecha"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="selected-time" class="block text-sm font-medium text-gray-700">Hora</label>
                        <select id="selected-time" name="hora"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                            <option value="08:00">08:00 AM</option>
                            <option value="08:30">08:30 AM</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="09:30">09:30 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="12:30">12:30 PM</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="13:30">01:30 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="14:30">02:30 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="15:30">03:30 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="16:30">04:30 PM</option>
                            <option value="17:00">05:00 PM</option>
                            <option value="17:30">05:30 PM</option>
                            <option value="18:00">06:00 PM</option>
                        </select>
                    </div>
                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="submit" id="register-button"
                            class="w-3/2 justify-end py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                            Registrar
                        </button>
                    </div>
                </form>
            @else
                <p>No se encontro el recurso solicitado</p>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                initialDate: new Date().toISOString().split('T')[0],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 'auto',
                navLinks: true,
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                slotDuration: '00:30:00',
                slotLabelInterval: '00:30',
                allDaySlot: false,
                minTime: '08:00:00',
                maxTime: '18:00:00',
                validRange: {
                    start: '2024-01-01',
                    end: '2024-12-31'
                },
                events: [
                    @foreach ($citas as $cita)
                        {
                            title: '{{ $cita->servicio->nombre }}',
                            start: '{{ $cita->fecha->format('Y-m-d') }}T{{ $cita->hora->format('H:i:s') }}',
                            end: '{{ $cita->fecha->format('Y-m-d') }}T{{ $cita->hora->addMinutes(30)->format('H:i:s') }}',
                            backgroundColor: '#9D2449',
                            borderColor: '#9D2449',
                            textColor: '#fffff',
                            id: '{{ $cita->id }}'
                        },
                    @endforeach
                ],
                viewDidMount: function(info) {
                    // Aplicar restricciones de selección según la vista actual
                    applyDayRestrictions(info.view.type);
                },
                viewDidUpdate: function(info) {
                    // Aplicar restricciones de selección según la vista actual
                    applyDayRestrictions(info.view.type);
                },
                dateClick: function(info) {
                    var today = new Date();
                    var selectedDate = new Date(info.dateStr);
                    var dayOfWeek = selectedDate.getDay();
                    var currentView = calendar.view.type;

                    // Verificar si el día es sábado o domingo según la vista actual
                    if (currentView === 'dayGridMonth') {
                        if (dayOfWeek === 6 || dayOfWeek === 5) { // Sábado y domingo en vista de mes
                            alert('Nota: Horario de consultas: Lunes a Viernes de 8am a 6pm.');
                            return;
                        }
                    } else if (currentView === 'timeGridWeek') {
                        if (dayOfWeek === 6 || dayOfWeek === 0) { // Sábado y domingo en vista de semana
                            alert('Nota: Horario de consultas: Lunes a Viernes de 8am a 6pm.');
                            return;
                        }
                    } else if (currentView === 'timeGridDay') {
                        if (dayOfWeek === 6 || dayOfWeek === 0) { // Sábado y domingo en vista de día
                            alert('Nota: Horario de consultas: Lunes a Viernes de 8am a 6pm.');
                            return;
                        }
                    }

                    // Verificar si la fecha es en el pasado
                    if (selectedDate < today.setHours(0, 0, 0, 0)) {
                        alert('No puedes seleccionar fechas pasadas.');
                        return;
                    }

                    var modal = document.getElementById('modal');
                    modal.style.display = 'flex';

                    var selectedDateField = document.getElementById('selected-date');
                    selectedDateField.value = info.dateStr;

                    var selectedTimeField = document.getElementById('selected-time');
                    var selectedTime = new Date(info.dateStr).toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    selectedTimeField.value = selectedTime;
                },
                dayCellDidMount: function(info) {
                    var dayOfWeek = info.date.getDay();
                    var viewType = calendar.view.type;

                    // Desactiva la selección de sábados y domingos en la vista de mes
                    if (viewType === 'dayGridMonth' && (dayOfWeek === 6 || dayOfWeek === 0)) {
                        info.el.classList.add('fc-day-disabled');
                    } else if (viewType !== 'dayGridMonth' && (dayOfWeek === 6 || dayOfWeek === 0)) {
                        // Opcional: Desactiva sábados y domingos en otras vistas si es necesario
                        info.el.classList.add('fc-day-disabled');
                    }
                }
            });

            calendar.render();

            // Cerrar el modal
            var closeModalBtn = document.getElementById('close-modal');
            closeModalBtn.addEventListener('click', function() {
                var modal = document.getElementById('modal');
                modal.style.display = 'none';
            });

            // Inicializar select2
            $('.select2').select2();

            function applyDayRestrictions(viewType) {
                var daysOfWeek = ['5', '6']; // Domingo y sábado
                var cells = document.querySelectorAll('.fc-daygrid-day');

                cells.forEach(function(cell) {
                    var dayOfWeek = cell.getAttribute('data-date') ? new Date(cell.getAttribute(
                        'data-date')).getDay() : -1;

                    if (viewType === 'dayGridMonth' && daysOfWeek.includes(dayOfWeek.toString())) {
                        cell.classList.add('fc-day-disabled');
                    } else {
                        cell.classList.remove('fc-day-disabled');
                    }
                });
            }
        });
    </script>
</body>

</html>

