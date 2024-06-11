<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registrarse</title>
</head>


<body
    style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <a href="https://www.gob.mx/" class="text-white text-xl hover:text-white">Cerrar sesion</a>
        </div>
    </header>

    <div class="flex items-center justify-center h-screen" style="margin-top: -50px;">
        <div class="bg-white bg-opacity-80 border-gray-800 p-8 md:p-10 rounded-lg shadow-xl flex flex-col items-center w-full max-w-2xl"> 
            <h2 class="text-2xl font-bold text-black">Ingresa los datos necesarios para registrarte</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4">
                <div>
                    <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombres" id="nombres"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="tipo_usuario" class="block text-sm font-medium text-gray-700">Tipo de personal</label>
                    <select name="tipo_usuario" id="tipo_usuario"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                        <option value="">Seleccione una opción</option>
                        <option value="recepcionista">Secretaria</option>
                        <option value="doctor">Doctor</option>
                    </select>
                </div>
                <div>
                    <label for="profesion" class="block text-sm font-medium text-gray-700">Profesión</label>
                    <input type="text" name="profesion" id="profesion"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="confirmar_contrasena" class="block text-sm font-medium text-gray-700">Confirmar
                        contraseña</label>
                    <input type="password" name="confirmar_contrasena" id="confirmar_contrasena"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo electronico</label>
                    <input type="email" name="correo" id="correo"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Número de teléfono</label>
                    <input type="tel" name="telefono" id="telefono"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>

                <div class="col-span-2 flex justify-between mt-6">
                    <button type="submit"
                        style="margin-right: 16px;" 
                        class="w-1/3 flex justify-center py-2 px-4 border border-colorgob1 text-bs font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                        Registrar
                    </button>
                    <button type="button"
                        class="w-1/3 flex justify-center py-2 px-4 border border-grisgob1  text-bs font-medium text-bg-grisgob1  hover:bg-grisgob1  hover:text-white" onclick="location.href='/'">
                        Regresar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>