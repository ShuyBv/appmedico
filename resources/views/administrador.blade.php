<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Administrador</title>
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

    <div class="flex flex-col items-center justify-center mt-6">
        <h2 class="font-bold text-2xl">Médicos</h2>
        <div class="w-4xl bg-white bg-opacity-75 rounded-lg p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Teléfono</th>
                        <th class="py-2 px-4 border-b border-gray-300">Correo</th>
                        <th class="py-2 px-4 border-b border-gray-300">Especialidad</th>
                        <th class="py-2 px-4 border-b border-gray-300">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">Jesus Olazaran</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">8341234567</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">jesusolazaran4@gmail.com</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">TUM-B</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><a class="bg-white text-grisgob1 px-4 py-2 border border-grisgob1 hover:bg-grisgob1 hover:text-white" href="#">Ver detalles</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center mt-6">
        <h2 class="font-bold text-2xl">Secretaria</h2>
        <div class="max-w-4xl bg-white bg-opacity-75 rounded-lg p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                    <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Teléfono</th>
                        <th class="py-2 px-4 border-b border-gray-300">Correo</th>
                        <th class="py-2 px-4 border-b border-gray-300">Área</th>
                        <th class="py-2 px-4 border-b border-gray-300">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">Hermayonick Catalina</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">8341234567</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">hercat@gmail.com</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">Recepción</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><a class="bg-white text-grisgob1 px-4 py-2 border border-grisgob1 hover:bg-grisgob1 hover:text-white" href="#">Ver detalles</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>