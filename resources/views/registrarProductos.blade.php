<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Productos</title>
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
    
    <div class="flex items-center justify-center h-screen" style="margin-top: -60px;">
        <div class="bg-opacity-75 p-8 md:p-10 border border-black shadow-xl flex flex-col items-center w-full max-w-2xl" style="background: #ffffff;"> 
            <h2 class="text-3xl font-bold">Registrar de productos</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4" action=" {{ route('registrar-producto') }} " method="POST">
                @csrf
                <div class="col-span-2">
                    <label for="nombreProducto" class="block text-sm font-medium">Nombre del producto</label>
                    <input type="text" name="nombreProducto" id="nombreProducto"
                        placeholder="Nombre de producto"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="cantidad" class="block text-sm font-medium">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad"
                        placeholder="Cantidad"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="precio" class="block text-sm font-medium">Precio por unidad</label>
                    <input type="text" name="precio" id="precio" 
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
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
</body>
</html>
