<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Recepcionista</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <a href="https://www.gob.mx/" class="text-white text-xl hover:text-white">Cerrar sesion</a>
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
        <div class="w-full max-w-6xl bg-white bg-opacity-75 rounded-lg p-3">
            <div class="flex justify-end mt-4 p-2">
                <button class="border border-colorgob1 text-bs text-colorgob1 hover:bg-colorgob1 hover:text-white px-4 py-2" onclick="location.href='/registroPacientes'">Registrar paciente</button>
            </div>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Última cita</th>
                        <th class="py-2 px-4 border-b border-gray-300">Próxima cita</th>
                        <th class="py-2 px-4 border-b border-gray-300">Agendar cita</th>
                        <th class="py-2 px-4 border-b border-gray-300">Total de pago</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">Jose Guadalupe Martinez Herrera</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">05/06/2024</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">17/07/2024</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="border border-colorgob3 text-colorgob3 text-bs px-4 py-2 hover:bg-colorgob3 hover:text-white" onclick="location.href='/citas'">Agendar cita</button></td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="border border-grisgob1 text-grisgob1 text-bs px-4 py-2 hover:bg-grisgob1 hover:text-white" onclick="location.href='/pago'">Ver pago</button></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">Jesus Antonio Olazaran Mora</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">02/04/2024</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">19/06/2024</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="border border-colorgob3 text-colorgob3 text-bs px-4 py-2 hover:bg-colorgob3 hover:text-white" onclick="location.href='/citas'">Agendar cita</button></td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="border border-grisgob1 text-grisgob1 text-bs px-4 py-2 hover:bg-grisgob1 hover:text-white" onclick="location.href='/pago'">Ver pago</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
