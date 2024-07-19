<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registrar Cita</title>
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

    <div class="flex-grow flex items-center justify-center mt-10">
        <div class="bg-opacity-75 p-8 md:p-10 border border-black shadow-xl flex flex-col items-center w-full max-w-2xl" style="background: #ffffff;"> 
            <h2 class="text-3xl font-bold">Registrar cita</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4" action=" {{ route('registrar-cita') }} " method="POST">
                @csrf
                <div class="col-span-2">
                    <label for="nombre" class="block text-sm font-medium">Nombre del paciente</label>
                    <input type="text" name="nombre" id="nombre"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2">
                    <label for="motivos" class="block text-sm font-medium">Motivo de la cita</label>
                    <input type="text" name="motivos" id="motivos"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="doctor" class="block text-sm font-medium">Doctor</label>
                    <select name="doctor" id="doctor"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border border-black shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="sin-elegir">Seleccionar doctor</option>
                        <option value="1">Fabián</option>
                    </select>
                </div>
                <div>
                    <label for="fechaHora" class="block text-sm font-medium">Fecha y hora</label>
                    <input type="datetime-local" name="fechaHora" id="fechaHora"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border border-black shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium">¿Desea agregar un servicio?</label>
                    <input type="radio" name="servicio" id="agregar" value="agregar"><label for="agregar"> Sí</label><br>
                    <input type="radio" name="servicio" id="no-agregar" value="no-agregar"><label for="no-agregar"> No</label>
                </div>
                <div id="containerServicio">
                    <label for="servicio" class="block text-sm font-medium">Tipo de servicio</label><br>
                    <select name="servicio" id="servicio"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border r shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="sin-elegir">Seleccionar servicio</option>
                        @foreach($servicios as $servicio)
                            <option value=" {{ $servicio->id }} "> {{ $servicio->nombreServicio }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2 flex justify-center">
                    <button type="submit"
                        style="margin-right: 16px;" 
                        class="border border-colorgob1 text-bs text-colorgob1 hover:bg-colorgob1 hover:text-white px-10 py-2 mr-2">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radioSi = document.getElementById('agregar');
            const radioNo = document.getElementById('no-agregar');
            const servicioContainer = document.getElementById('containerServicio');

            function toggleServicio() {
                if (radioSi.checked) {
                    servicioContainer.style.display = 'block';
                } else if (radioNo.checked) {
                    servicioContainer.style.display = 'none';
                } else {
                    servicioContainer.style.display = 'none';
                }
            }
            radioSi.addEventListener('change', toggleServicio);
            radioNo.addEventListener('change', toggleServicio);

            toggleServicio();
        });
    </script>
</body>
</html>