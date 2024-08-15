<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Perfil Paciente</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
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
        <a href="/perfil" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Mis datos</a>
    </div>

    <div class="flex h-screen">
        <div class="bg-blue-650 border border-gray-300 bg-grisgob2 text-gray-700 w-1/5 p-6 flex flex-col justify-between shadow-xl">
            <div>
                <div class="flex items-center mb-8">
                    <span class="text-2xl font-bold ">Mis datos</span>
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
                
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow p-10">
            <div class="bg-transparent text-gray-700 p-2 border border-transparent mb-6">
                <h2 class="text-3xl font-bold text-black text-center mb-4">Historial Médico</h2>
                <table class="min-w-full bg-white border border-gray-300 shadow-xl text-gray-700">
                    <thead>
                        <tr class="bg-white border border-gray-300">
                            <th class="py-2 px-4 text-center">Fecha cita</th>
                            <th class="py-2 px-4 text-center">Hora cita</th>
                            <th class="py-2 px-4 text-center">Informe   </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($citas->isNotEmpty())
                            @foreach($citas as $cita)
                            <tr class="border border-gray-100 hover:bg-grisgob2">
                                    <td class="py-2 px-4 text-center">{{ $cita->fecha->format('Y-m-d') }}</td>
                                    <td class="py-2 px-4 text-center">{{ $cita->formatted_hora }}</td>
                                    <td class="py-2 px-4 text-center">
                                        <button class="w-3/2 justify-end py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white" onclick="window.location.href='{{ route('generate.pdf', ['id' => $cita->id]) }}'">
                                            Descargar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="py-2 px-4 text-center text-gray-700">En este momento no tienes historial</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
