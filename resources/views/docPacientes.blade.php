<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Pacientes</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inputSearch = document.querySelector(
                '.search-input');
            var tbody = document.querySelector('tbody');

            inputSearch.addEventListener('input', function(e) {
                var filterValue = e.target.value.toLowerCase();
                var rows = tbody.getElementsByTagName('tr');

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var match = false;

                    var cells = row.getElementsByTagName('td');
                    for (var j = 0; j < cells.length && !match; j++) {
                        var cellText = cells[j].textContent || cells[j].innerText;
                        match |= cellText.toLowerCase().indexOf(filterValue) !== -1;
                    }

                    if (match) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
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
        <a href="/doctor" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Agenda</a>
        <a href="/docPacientes" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Pacientes</a>
        <a href="/docServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/docProductos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
        <a href="/docIngresos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Ingresos</a>
    </div>

    </div>
        <div class="flex-1 flex flex-col p-6">
            <div class="flex justify-end mt-6 items-end">
                <button
                    class="w-3/2 justify-end py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white"
                    onclick="location.href='/registroPacientesDoc'">
                    Registrar Paciente
                </button>
            </div>

            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white border border-gray-300 shadow-xl text-gray-700">
                    <thead>
                        <tr class="bg-white border border-gray-300">
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Correo</th>
                            <th class="py-2 px-4 text-center">Próxima cita</th>
                            <th class="py-2 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($pacientes))
                            @foreach ($pacientes as $paciente)
                            <tr class="border border-gray-100 hover:bg-grisgob2">
                                    <td class="py-2 px-4">{{ $paciente->nombre }}</td>
                                    <td class="py-2 px-4">{{ $paciente->correo }}</td>
                                    <td class="py-2 px-4 text-center">
                                        @if($paciente->citas->isNotEmpty())
                                            {{ $paciente->citas->first()->fecha->format('d/m/Y') }} a las {{ $paciente->citas->first()->formatted_hora }}
                                        @else
                                            No hay citas en agenda
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 text-center">
                                        <button
                                            class="inline-flex justify-center py-2 px-4 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white"
                                            onclick="location.href='/expediente/{{ $paciente->id }}'">Mas detalles</button>
                                        <button
                                            class="inline-flex justify-center py-2 px-4 ml-2 border border-colorgob3 text-sm font-medium text-colorgob3 bg-white hover:bg-colorgob3 hover:text-white"
                                            onclick="location.href='{{ route('pacientesDoc.edit', $paciente->id) }}'">Editar</button>
                                        <form action="{{ route('docPacientes.destroy', $paciente->id) }}" method="post" class="inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">Eliminar</button>
                                        </form>
                                    </td> 
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
