<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imagenes/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @vite('resources/css/app.css')
    <title>Iniciar sesión</title>
</head>

<!-- <<body class="flex items-center justify-center" style="background-image: url('imagenes/Login.png'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; height: 100vh; margin: 0; padding: 0;">-->
<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
        <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
            <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
            <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
            <div class="flex space-x-8">
                <a href="https://www.gob.mx/segob/documentos/tramites-y-servicios-17706" class="text-white text-xl hover:text-white">Trámites</a>
                <a href="https://www.gob.mx/" class="text-white text-xl hover:text-white">Gobierno</a>
            </div>
        </header>

    <div class="flex justify-center items-center h-full" style="margin-top: -40px;">
        <div class="bg-opacity-80 bg-white border border-grisgob1 p-4 md:p-10 shadow-xl flex flex-col items-center w-full max-w-md">
            <h2 class="text-2xl font-bold mt-6">
                Bienvenido, <span class="font-normal"> ingresa tus datos</span>
            </h2>
        <form class="mt-6 w-full" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-bs font-medium text-gray-700">Correo Electronico</label>
                <input id="email" type="email" name="email" placeholder="Ingresa tu correo electronico"
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm" required autofocus autocomplete="username"> <!-- Aumentar el padding y tamaño de fuente -->
            </div>

            <div class="mb-4">
                <label for="password" class="block text-bs font-medium text-gray-700">Contraseña</label>
                <input id="password" type="password" name="password" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm" required autocomplete="current-password"> <!-- Aumentar el padding y tamaño de fuente -->
            </div>

            @error('email')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div class="flex-grow flex items-end justify-center mt-6">
                <button type="submit" class="flex justify-center py-2 px-4 border border-colorgob1 text-bs font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">Ingresar</button>
            </div>
        </form>
        </div>
    </div>
</body>

</html>