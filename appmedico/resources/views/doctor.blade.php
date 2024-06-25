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
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <a href="{{ route('logout') }}"><button class=" text-white text-xl hover:text-white ">Cerrar sesión</button></a>        
        </div>
    </header>
    

    <div class="flex justify-center mt-6">
        <div class="relative w-2/3 max-w-2xl">
            <input type="text" placeholder="Buscar paciente"
                class="w-full py-2 pl-4 pr-10 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="absolute right-3 top-2.5 w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M16.44 11.2a5.45 5.45 0 11-10.89 0 5.45 5.45 0 0110.89 0z" />
            </svg>
        </div>
    </div>

    <div class="flex-grow flex items-center justify-center mt-6">
        <div class="w-full max-w-3xl bg-white bg-opacity-75 rounded-lg p-6">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Fecha</th>
                        <th class="py-2 px-4 border-b border-gray-300">Hora</th>
                        <th class="py-2 px-4 border-b border-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">Jesus Olazaran</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">19/06/2024</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">1:30 p.m.</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="bg-white text-colorgob3 px-4 py-2 border border-colorgob3 hover:bg-colorgob3 hover:text-white" onclick="location.href='/detallesPacientes'">Ver detalles</button> <button class="bg-white text-colorgob1 px-4 py-2 border border-colorgob1 hover:bg-colorgob1 hover:text-white" onclick="location.href='/detallesPacientes'">Ver Expediente</button></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">Jose Guadalupe</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">17/07/2024</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">08:15 a.m.</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="bg-white text-colorgob3 px-4 py-2 border border-colorgob3 hover:bg-colorgob3 hover:text-white" onclick="location.href='/detallesPacientes'">Ver detalles</button> <button class="bg-white text-colorgob1 px-4 py-2 border border-colorgob1 hover:bg-colorgob1 hover:text-white" onclick="location.href='/detallesPacientes'">Ver Expediente</button></td>                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
