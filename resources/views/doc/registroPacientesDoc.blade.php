<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registrar paciente</title>
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
        <a href="/doctor" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Agenda</a>
        <a href="/docPacientes" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Pacientes</a>
        <a href="/docServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/docProductos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
        <a href="/docIngresos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Ingresos</a>
    </div>

        <div class="flex justify-center items-center h-full" style="margin-top: 80px;">
            <div class="bg-white p-8 mb-4 md:p-10 w-1/2 border border-black">
                <h2 class="text-2xl font-bold text-black text-center mb-6">Registrar paciente</h2>
                <form action="{{ route('registrar-pacientes-doc') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa el nombre" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label for="password" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa los apellidos" required>
                        </div>
                    </div>

                    <div class="flex justify-center mt-4">
                        <div class="text-md font-medium text-black">
                            Datos clínicos
                        </div>
                    </div>
                    
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Alergias</label>
                        <input type="text" name="alergias" id="alergias"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Ingresa las alergias" required>
                    </div>

                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label for="password" class="block text-sm font-medium text-gray-700">Enfermedades cronicas</label>
                        <input type="text" name="enfermedades" id="enfermedades"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Ingresa las enfermedades cronicas" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Edad</label>
                            <input type="number" name="edad" id="edad"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa la edad" required>
                        </div>
                        
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Género</label>
                            <select name="genero" id="genero"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                                <option value="">Selecciona tu género</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="prefiero-no-especificar">No especificar</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Peso</label>
                            <input type="text" name="peso" id="peso"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa el peso" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Altura</label>
                            <input type="text" name="altura" id="altura"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa la altura" required>
                        </div>
                    </div>
                    
                    <div class="flex justify-center mt-4">
                        <div class="text-md font-medium text-black">
                            Datos de la cuenta
                        </div>
                    </div>

                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Correo electronico</label>
                        <input type="email" name="correo" id="correo"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="ingresa el correo" required>
                    </div>
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="ingresa la contraseña" required>
                    </div>
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Telefono de contacto</label>
                        <input type="tel" name="telefono" id="telefono"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Ingresa el telefono de contacto" required>
                    </div>
                    <div class="flex-grow flex justify-between mt-6">
                        <button type="button"
                            class="w-full flex justify-center py-2 px-4 mr-2 border  border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white"
                            onclick="location.href='/'">
                            Regresar
                        </button>
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
