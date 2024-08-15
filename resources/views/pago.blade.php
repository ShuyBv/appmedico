<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ver Pagos</title>
</head>

<body style="background-image: url('{{ asset('img/fondo.png') }}'); background-size: cover; background-position: center; background-attachment: scroll; margin: 0; padding: 0;">
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
        <a href="/recepcionista" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Agenda</a>
        <a href="/verServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/verPacientes" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Pacientes</a>
        <a href="/Productos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
    </div>

        <div class="flex-1 flex flex-col p-6">
            <div class="flex justify-end mt-6">
                <button type="button"
                    class="w-3/2 justify-end py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white"
                    onclick="location.href='{{ route('verPacientes') }}'">
                    Regresar
                </button>
            </div>

            <div class="flex justify-end m-2">
                <h3 class="text-xl font-bold text-gray-700">Total: <span class="text-gray-700">
                    ${{ $citas->where('estado', 'Pendiente')->sum(fn($cita) => $cita->total) }}
                </span></h3>
            </div>

            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-300 shadow-xl text-gray-700">
                    <thead>
                        <tr class="bg-white border border-gray-300">
                            <th class="py-2 px-4 text-left">Servicio</th>
                            <th class="py-2 px-4 text-center">Precio</th>
                            <th class="py-2 px-4 text-center">Fecha</th>
                            <th class="py-2 px-4 text-center">Estado</th>
                            <th class="py-2 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                        <tr class="border border-gray-300 hover:bg-grisgob2">
                            <td class="py-2 px-4">{{ $cita->tipo_servicio->nombre }}</td>
                                <td class="py-2 px-4 text-center">${{ $cita->total}}</td>
                                <td class="py-2 px-4 text-center">{{ $cita->fecha->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 text-center">
                                    @if ($cita->estado == 'Pendiente')
                                        <span class="text-yellow-500 font-bold">Pendiente</span>
                                    @else
                                        <span class="text-green-500 font-bold">Pagado</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-center">
                                    <form action="{{ route('cambiarEstadoPago', $cita->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $id }}">
                                        @if ($cita->estado == 'Pendiente')
                                            <button type="submit"
                                                class="w-3/2 justify-end py-2 px-4 ml-2 border border-colorgob3 text-sm font-medium text-colorgob3 bg-white hover:bg-colorgob3 hover:text-white">
                                                Pagar
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="w-3/2 justify-end py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                                                Pendiente
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
