<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Modificar Pacientes</title>
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
        <a href="/verServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/verPacientes" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Pacientes</a>
        <a href="/Productos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
    </div>

        <div class="flex justify-center items-center h-full" style="margin-top: 80px;">
            <div class="bg-white p-8 mb-4 md:p-10 w-1/2 border border-black">
                <h2 class="text-2xl font-bold text-black text-center mb-6">Ingresa los nuevos datos</h2>
                <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $paciente->nombre }}" 
                                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                    placeholder="Ingresa el nombre" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label for="password" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" value="{{ $paciente->apellidos}}" 
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
                        <input type="text" name="alergias" id="alergias" value="{{ $paciente->alergias}}" 
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa las alergias" required>
                    </div>
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label for="password" class="block text-sm font-medium text-gray-700">Enfermedades cronicas</label>
                        <input type="text" name="enfermedades" id="enfermedades" value="{{ $paciente->enfermedades}}" 
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa las enfermedades cronicas" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Edad</label>
                            <input type="number" name="edad" id="edad" value="{{ $paciente->edad}}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa la nueva edad" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Género</label>
                            <select name="genero" id="genero" value="{{ $paciente->genero}}" 
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">                                <option value="">Genero</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="prefiero-no-especificar">Prefiero no especificar</option>
                            </select>
                        </div>

                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Altura</label>
                            <input type="text" name="altura" id="altura" value="{{ $paciente->altura}}" 
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa la nueva altura" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Peso</label>
                            <input type="text" name="peso" id="peso" value="{{ $paciente->peso}}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa el nuevo peso" required>
                        </div>
                    </div>
                    
                    <div class="flex justify-center mt-4">
                        <div class="text-md font-medium text-black">
                            Datos de la cuenta
                        </div>
                    </div>

                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Correo electronico</label>
                        <input type="email" name="correo" id="correo" value="{{ $paciente->correo}}" 
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="ingresa el nuevo correo" required>
                    </div>
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="ingresa la nueva contraseña" required>
                    </div>
                    <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Telefono de contacto</label>
                        <input type="tel" name="telefono" id="telefono" value="{{ $paciente->telefono}}" 
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Ingresa el nuevo numero de contacto" required>
                    </div>

                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="button"
                            class="w-full flex justify-center py-2 px-4 mr-2 border  border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white" onclick="location.href='/verPacientes'">
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