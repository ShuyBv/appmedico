<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Servicios</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
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

    <div class="flex justify-center items-center h-full" style="margin-top: 40px;">
        <div class="bg-white p-8 mb-4 md:p-10 w-1/2 border border-black">
                <div class="my-4">
                    @session('succes')
                        <div class="alert alert-success" role="alert">
                            {{ $value }}
                        </div>
                    @endsession
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="text-3xl font-bold text-black text-center mb-6">Registrar servicio</h2>
                <form action="{{ route('servicios.store') }}" method="POST">
                    @csrf
                    <fieldset class="mb-4">
                        <legend class="sr-only">Información del servicio</legend>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Nombre del servicio" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="number" name="precio" id="precio"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Precio" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Duración</label>
                            <input type="text" name="duracion" id="duracion"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Duración" required>
                        </div>
                    </fieldset>
                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                            Registrar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>