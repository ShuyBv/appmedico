<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Modificar Empleado</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; background-attachment: scroll; height: 100vh; margin: 0; padding: 0;">
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
        <a href="/verUsuarios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Empleados</a>
        <a href="/registroUsuarios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Registrar</a>
    </div>

    <div class="flex justify-center items-center h-full" style="margin-top: 40px;">
           <div class="bg-white p-8 md:p-10 shadow-xl w-full max-w-sm border border-black">
                <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Ingresa los datos a editar</h2>
                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4 flex items-center bg-white shadow-sm">
                            <input type="text" name="nombre" id="nombre"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Nombre(s)" value="{{ $usuario->nombre }}" required>
                        </div>
                        <div class="mb-4 flex items-center bg-white shadow-sm">
                            <input type="text" name="apellidos" id="apellidos"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Apellidos(s)" value="{{ $usuario->apellidos }}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4 flex items-center bg-white shadow-sm">
                            <select name="tipoUsuario" id="tipoUsuario" value="{{ $usuario->tipoUsuario }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                required>
                                <option value="">Seleccione una opción</option>
                                <option value="recepcionista">Recepcionista</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                        <div class="mb-4 flex items-center bg-white shadow-sm">
                            <input type="text" name="area" id="area" value="{{ $usuario->area}}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Área" required>
                        </div>
                    </div>
                    <div class="mb-4 flex items-center bg-white shadow-sm">
                        <input type="email" name="correo" id="correo" value="{{ $usuario->correo}}"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Correo" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white shadow-sm">
                        <input type="password" name="password"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Contraseña" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white shadow-sm">
                        <input type="password" name="confirmar_contrasena" id="confirmar_contrasena"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Confirmar contraseña" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white shadow-sm">
                        <input type="tel" name="telefono" id="telefono" value="{{ $usuario->telefono}}"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Número de teléfono" required>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <button type="button"
                            class="flex-grow flex justify-center py-2 px-4 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white"
                            onclick="location.href='/verUsuarios'">
                            Regresar
                        </button>
                        <div class="w-4"></div> <!-- Espacio entre los botones -->
                        <button type="submit"
                            class="flex-grow flex justify-center py-2 px-4 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>