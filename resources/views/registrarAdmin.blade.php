<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro Administrador</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <h1 class="text-white text-xl font-bold">Consultorio del Bienestar</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('registrarAdmin') }}  " class=" px-4 py-4  text-white hover:text-colorgob3">Registrar administrador</a>
            <a href=" {{ route('registrarEmpleado') }} " class=" px-4 py-4  text-white hover:text-colorgob3">Registrar empleado</a>
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class=" text-white text-xl hover:text-white ">Cerrar sesión</a>
        </div>
    </header>
    
    <div class="flex items-center justify-center h-screen" style="margin-top: -5px;">
        <div class="bg-opacity-75 p-8 md:p-10 border border-black shadow-xl flex flex-col items-center w-full max-w-2xl" style="background: #ffffff;"> 
            <h2 class="text-3xl font-bold">Registrar Administrador</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4" action=" {{ route('registrar-admin') }}" method="POST">
                @csrf
                <div class="col-span-2">
                    <label for="nombre" class="block text-sm font-medium">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        placeholder="Nombre completo"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="fechaNacimiento" class="block text-sm font-medium">Fecha de nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="telefono" class="block text-sm font-medium">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" 
                        placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email"
                        placeholder="correo@ejemplo.com"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2">
                    <label for="password" class="block text-sm font-medium">Contraseña</label>
                    <input type="password" name="password" id="password" 
                        placeholder="Contraseña"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2 flex justify-center">
                    <button type="submit"
                        style="margin-right: 16px;"
                        class="border border-colorgob1 text-bs text-colorgob1 hover:bg-colorgob1 hover:text-white px-10 py-2 mr-2">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>