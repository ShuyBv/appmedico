<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registrar Pacientes</title>
</head>


<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <a href="https://www.gob.mx/" class="text-white text-xl hover:text-white">Cerrar sesion</a>
        </div>
    </header>
    
    <div class="flex items-center justify-center h-screen" style="margin-top: 0px;">
        <div class="bg-white bg-opacity-75 p-8 md:p-10 rounded-lg shadow-xl flex flex-col items-center w-full max-w-2xl"> 
            <h2 class="text-3xl font-bold text-black">Registrar paciente</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4">
                <div>
                    <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre:</label>
                    <input type="text" name="nombres" id="nombres"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-bs"
                        required>
                </div>
                <div>
                    <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-bs"
                        required>
                </div>
                
                <div class="col-span-2">
                    <label for="enfermedades" class="block text-sm font-medium text-gray-700">Enfermedades</label>
                    <input type="text" name="enfermedades" id="enfermedades"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-bs">
                </div>
                <div class="col-span-2">
                    <label for="alergias" class="block text-sm font-medium text-gray-700">Alergias</label>
                    <input type="text" name="alergias" id="alergias"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-bs">
                </div>
                <div class="col-span-2 flex space-x-4 justify-between">
                    <div class="flex-1">
                        <label for="altura" class="block text-sm font-medium text-gray-700">Altura</label>
                        <input type="text" name="altura" id="altura"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-bs">
                    </div>
                    <div class="flex-1 ml-4">
                        <label for="peso" class="block text-sm font-medium text-gray-700">Peso</label>
                        <input type="text" name="peso" id="peso"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-bs">
                    </div>
                    <div class="flex-1 ml-4">
                        <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                        <input type="text" name="edad" id="edad"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700sm:text-bs">
                    </div>
                    <div class="flex-1 ml-4">
                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                        <select name="sexo" id="sexo"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-bs">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="prefiero-no-especificar">Prefiero no especificar</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
                    <input type="email" name="correo" id="correo"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-bs"
                        required>
                </div>
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Número de teléfono</label>
                    <input type="tel" name="telefono" id="telefono"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div class="col-span-2 flex justify-between mt-6">
                    <button type="submit"
                        style="margin-right: 16px;" 
                        class="w-2/3 flex justify-center py-2 px-4 border border-colorgob1 text-bs font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                        Registrar
                    </button>
                    <button type="button"
                        class="w-2/3 flex justify-center py-2 px-4 border border-grisgob1 text-bs font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white" onclick="location.href='/recepcionista'">
                        Regresar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>