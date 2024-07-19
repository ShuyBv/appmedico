<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Doctor</title>
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

    <div class="flex flex-col items-center justify-center mt-6">
        <h2 class="font-bold text-2xl">Registro de pacientes</h2> 
        <div class="flex justify-end mt-4 p-2">
            <a href=" {{ route('registrarPacientes') }} " 
                class="border border-colorgob1 text-bs text-colorgob1 hover:bg-colorgob1 hover:text-white px-4 py-2 mr-2">
                Registrar paciente
            </a> 
        </div>
        <div class="w-4xl bg-white bg-opacity-75 rounded-lg p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Teléfono</th>
                        <th class="py-2 px-4 border-b border-gray-300">Correo</th>
                        <th class="py-2 px-4 border-b border-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                    <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">{{ $paciente->nombre }}</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">{{ $paciente->telefono }}</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">{{ $paciente->email }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">
                            <a class="bg-white text-grisgob1 px-4 py-2 border border-grisgob1 hover:bg-grisgob1 hover:text-white" href="#">Ver detalles</a>
                            <a class="bg-white text-colorgob3 px-4 py-2 border border-colorgob3 hover:bg-colorgob3 hover:text-white" href="#">Ver Expediente</a>
                            <a class="bg-white text-colorgob1 px-4 py-2 border border-colorgob1 hover:bg-colorgob1 hover:text-white" href="#">Consultar</a>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
