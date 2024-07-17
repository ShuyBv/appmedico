<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    
    <!-- Título de la página en la pestaña -->
    <title>Iniciar sesión</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <a href="https://www.gob.mx/segob/documentos/tramites-y-servicios-17706" class="text-white text-xl hover:text-white">Trámites</a>
            <a href="https://www.gob.mx/" class="text-white text-xl hover:text-white">Gobierno</a>
        </div>
    </header>
    <!-- Contenedor principal que centra el contenido verticalmente -->
    <div class="flex justify-center items-center h-full" style="margin-top: -40px;">
        <!-- div contenedor del formulario de inicio de sesión -->
        <div class="bg-opacity-80 bg-white border border-grisgob1 p-4 md:p-10 shadow-xl flex flex-col items-center w-full max-w-md">
            <!-- Título de bienvenida -->
            <h2 class="text-2xl font-bold mt-6">
                Bienvenido, <span class="font-normal"> ingresa tus datos</span>
            </h2>
            
            <!-- Formulario de inicio de sesión -->
            <form class="mt-6 w-full" action="{{ route('verificar-login') }}" method="POST">
                @csrf 
                <!-- Campo de correo electrónico -->
                <div class="mb-4">
                    <label for="email" class="block text-bs font-medium text-gray-700">Correo Electronico</label>
                    <input type="email" name="correo" id="correo" placeholder="Ingresa tu correo electronico"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>
                
                <!-- Campo de contraseña -->
                <div class="mb-4">
                    <label for="password" class="block text-bs font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                        required>
                </div>
                
                <!-- Botón de inicio de sesión -->
                <div class="flex-grow flex items-end justify-center mt-6">
                    <button type="submit"
                        class="flex justify-center py-2 px-4 border border-colorgob1 text-bs font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                        Ingresar
                    </button>
                </div>
            </form>
            
            <!-- Enlace para registrarse
            <p class="mt-6 text-center text-sm">
                <a href="#" class="font-medium text-gray-600 hover:text-gray-500" onclick="location.href='/registroUsuarios'"> Regístrate
                </a>
            </p>-->
        </div>
    </div>
</body>

</html>
