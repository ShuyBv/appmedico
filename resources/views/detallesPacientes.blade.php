<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Detalles Pacientes</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
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
        <a href="/doctor" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Agenda</a>
        <a href="/docPacientes" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Pacientes</a>
        <a href="/docServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/docProductos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
        <a href="/docIngresos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Ingresos</a>
    </div>
    </div>
</body>

</html>
