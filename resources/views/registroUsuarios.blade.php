<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registrar Empleado</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; background-attachment: scroll; margin: 0; padding: 0;">
    <header class="flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <button
                class="w-full flex justify-center py-2 px-2 border border-transparent text-xl font-medium rounded-md text-white"
                onclick="location.href='/'">
                Atrás
            </button></div>
    </header>
    <div class="bg-colorgob4 p-2 text-center text-gray-700">
        <a href="/verUsuarios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Empleados</a>
        <a href="/registroUsuarios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Registrar</a>
        <a href="/DoctorColaborador" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Enfermera</a>
        <a href="/Enfermera" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Medico Colaborador</a>
    </div>

    <div class="flex justify-center items-center h-full" style="margin-top: 80px;">
            <div class="bg-white p-8 md:p-10 w-1/2 border border-black">
                <h2 class="text-2xl font-bold text-black text-center mb-6">Registro de Empleado</h2>
                <form action="{{ route('validar-registro') }}" method="POST">
                    @csrf
                    <div class="flex justify-center mt-4">
                        <div class="text-md font-medium text-black">
                            Datos personales
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa el nombre" required>
                        </div>
                        <div class="mb-4 items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa el apellido" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4 items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Tipo de empleado</label>
                            <select name="tipoUsuario" id="tipoUsuario"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                required>
                                <option value="">Selecciona el tipo de empleado</option>
                                <option value="recepcionista">Recepcionista</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>

                        <div class="mb-4 items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Área</label>
                            <input type="text" name="area" id="area"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                placeholder="Ingresa el Área" required>
                        </div>
                    </div>
                    
                    <div class="flex justify-center mt-4">
                        <div class="text-md font-medium text-black">
                            Datos de la cuenta
                        </div>
                    </div>
                    <div class="mb-4 items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Correo electronico</label>
                        <input type="email" name="correo" id="correo"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Ingresa el correo electronico" required>
                    </div>

                    <div class="mb-4 items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Ingresa la contraseña" required>
                    </div>
                    <div class="mb-4 items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                        <input type="password" name="confirmar_contrasena" id="confirmar_contrasena"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Confirma la contraseña" required>
                    </div>
                    <div class="mb-4 items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <label class="block text-sm font-medium text-gray-700">Telefono de contaco</label>
                        <input type="tel" name="telefono" id="telefono"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                            placeholder="Ingresa tu telefono de contacto" required>
                    </div>

                    <div class="flex items-center justify-center mt-6 space-x-4">
                        <button type="button"
                            class="flex justify-center py-2 px-4 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white"
                            onclick="location.href='/verUsuarios'">
                            Regresar
                        </button>
                        <button type="submit"
                            class="flex justify-center py-2 px-4 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                            Registrar
                        </button>
                    </div>
                    
                </form>
            </div>
    </div>
</body>

</html>