<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; background-attachment: scroll; margin: 0; padding: 0;">
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
        <a href="/docPacientes" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Pacientes</a>
        <a href="/docServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/docProductos" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Productos</a>
        <a href="/docIngresos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Ingresos</a>
    </div>

        <div class="flex justify-center items-center h-full" style="margin-top: 40px;">
            <div class="bg-white p-8 mb-4 md:p-10 w-1/2 border border-black">
                <h2 class="text-3xl font-bold text-black text-center mb-6">Editar Producto</h2>
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('docProductos.update', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Producto</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Nombre del producto" required>
                    </div>
                    @error('nombre')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Marca</label>
                        <input type="text" name="marca" id="marca" value="{{ $producto->marca }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Marca del producto" required>
                    </div>
                    @error('marca')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Precio</label>
                        <input type="number" name="costo" id="costo" value="{{ $producto->costo }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Precio" required>
                    </div>
                    @error('costo')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" value="{{ $producto->cantidad}}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Cantidad" required>
                    </div>
                    @error('cantidad')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="button"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white" onclick="location.href='/docProductos'">
                            Regresar
                        </button>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                            Actualizar
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>

</html>
