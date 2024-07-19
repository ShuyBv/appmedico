<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Servicios</title>
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
        <h2 class="font-bold text-2xl">Productos disponibles</h2>
        
        <div class="flex justify-center p-6">
            <a href=" {{ route('registrarServicio') }} " 
            class="border border-colorgob1 text-bs text-colorgob1 hover:bg-colorgob1 hover:text-white px-10 py-2 mr-2">
            Registrar servicio
            </a> 
        </div>
        <div class="w-2/3 bg-white bg-opacity-75 rounded-lg p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Servicio</th>
                        <th class="py-2 px-4 border-b border-gray-300">Precio</th>
                        <th class="py-2 px-4 border-b border-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap"> {{ $servicio->nombreServicio }} </td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"> {{ $servicio->precio }} </td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"> - </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
