<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Detalles del Paciente</title>
</head>

<body style="background-image: url('{{ asset('img/fondo.png') }}'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
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
    
    <div class="flex h-screen">
        <div class="bg-blue-650 border border-gray-300 bg-grisgob2 text-gray-700 w-1/5 p-6 flex flex-col justify-between shadow-xl">
            <div>
                <div class="flex items-center mb-8">
                    <span class="text-2xl font-bold ">Datos del paciente</span>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <p><span class="font-semibold">Nombres:</span> {{ $paciente->nombre }}</p>
                        <p><span class="font-semibold">Apellidos:</span> {{ $paciente->apellidos }}</p>
                        <p><span class="font-semibold">Edad:</span> {{ $paciente->edad }}</p>
                        <p><span class="font-semibold">Enfermedades cronicas:</span> {{ $paciente->enfermedades ?: 'N/A' }}</p>
                        <p><span class="font-semibold">Alergias:</span> {{ $paciente->alergias ?: 'N/A' }}</p>
                        <p><span class="font-semibold">Género:</span> {{ $paciente->genero }}</p>
                        <p><span class="font-semibold">Peso:</span> {{ $paciente->peso }} kg</p>
                        <p><span class="font-semibold">Altura:</span> {{ $paciente->altura }} cm</p>
                        <p><span class="font-semibold">Correo:</span> {{ $paciente->correo }}</p>
                        <p><span class="font-semibold">Teléfono:</span> {{ $paciente->telefono }}</p>
                    </div>
                </div>
                <div class="col-span-2 flex justify-between mt-6">
                    <button type="button"
                        class="inline-flex justify-center py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white"
                        onclick="location.href='/docPacientes'">
                        Regresar
                    </button>
                </div>
            </div>
        </div>

        <div class="flex-grow p-10">
            <div class="bg-transparent text-gray-700 p-2 border border-transparent mb-6">
                <h2 class="text-3xl font-bold text-black text-center mb-4">Historial Médico</h2>

                <div class="flex-grow flex items-center justify-center mt-6">
                    <table class="min-w-full bg-white bg-opacity-10 rounded-lg shadow-xl text-gray-700">
                        <thead>
                            <tr class="bg-white border border-gray-300">
                                <th class="py-2 px-4 text-center">Fecha cita</th>
                                <th class="py-2 px-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($citas as $cita)
                            <tr class="border border-gray-100 hover:bg-grisgob2">
                                <td class="py-2 px-4 text-center">{{ $cita->fecha->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 text-center">
                                    <button
                                        class="inline-flex justify-center py-2 px-4 ml-2 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white" onclick="location.href='/detallesCita/{{ $cita->id }}'">Detalles</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>