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
    <title>Doctor</title>
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
        <a href="/doctor" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Agenda</a>
        <a href="/docPacientes" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Pacientes</a>
        <a href="/docServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/docProductos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
        <a href="/docIngresos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Ingresos</a>
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
                <form id="appointment-form" method="POST" action="{{ route('doctor.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="patient-name" class="block text-sm font-medium text-gray-700">Paciente</label>
                        <select id="patient-name" name="id_paciente" class="mt-1 p-2 block w-full border border-gray-300 rounded-md select2">
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="appointment-reason" class="block text-sm font-medium text-gray-700">Motivo</label>
                        <input type="text" id="motivos" name="motivos" class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="service-type" class="block text-sm font-medium text-gray-700">Tipo de servicio</label>
                        <select id="service-type" name="id_servicio" class="mt-1 p-2 block w-full border border-gray-300 rounded-md select2">
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 hidden">
                        <input type="text" id="selected-date" name="fecha" class="mt-1 p-2 block w-full border border-gray-300 rounded-md" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="selected-time" class="block text-sm font-medium text-gray-700">Selecciona una hora</label>
                        <select id="selected-time" name="hora" class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
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
                initialView: 'dayGridMonth', // Cambiado a vista mensual
                initialDate: new Date().toISOString().split('T')[0],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                height: 'auto',
                navLinks: true,
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
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
                dateClick: function(info) {
                    var today = new Date();
                    var selectedDate = new Date(info.dateStr);
    
                    if (selectedDate < today.setHours(0, 0, 0, 0)) {
                        alert('Nota: Este día ya pasó.');
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
    
                    // Desactiva la selección de sábados y domingos en la vista de mes
                    if (dayOfWeek === 6 || dayOfWeek === 0) { // Sábado y domingo
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
        });
    </script>

</body>

</html>
