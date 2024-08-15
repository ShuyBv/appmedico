<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ver Usuarios</title>
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
                Atrás
            </button></div>
    </header>
    <div class="bg-colorgob4 p-2 text-center text-gray-700">
        <a href="/verUsuarios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Empleados</a>
        <a href="/registroUsuarios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Registrar</a>
    </div>

        <div class="flex-1 flex flex-col p-6">
            <!--<div class="flex justify-center mt-6">
                <div class="relative w-2/3 max-w-2xl">
                    <input type="text" placeholder="Buscar"
                        class="w-full py-2 pl-4 pr-10 border border-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 search-input">
                    <svg class="absolute right-3 top-2.5 w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.44 11.2a5.45 5.45 0 11-10.89 0 5.45 5.45 0 0110.89 0z" />
                    </svg>
                </div>
            </div>-->

            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white border border-gray-300 shadow-xl text-gray-700">
                    <thead>
                        <tr class="bg-white border border-gray-300">
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Correo</th>
                            <th class="py-2 px-4 text-left">Área</th>
                            <th class="py-2 px-4 text-left">Tipo de empleado</th>
                            <th class="py-2 px-4 text-center">Numero</th>
                            <th class="py-2 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($usuarios))
                            @foreach ($usuarios as $usuario)
                            <tr class="border border-gray-100 hover:bg-grisgob2">
                                    <td class="py-2 px-4">{{ $usuario->nombre }}</td>
                                    <td class="py-2 px-4">{{ $usuario->correo }}</td>
                                    <td class="py-2 px-4">{{ $usuario->area}}</td>
                                    <td class="py-2 px-4">{{ $usuario->tipoUsuario}}</td>
                                    <td class="py-2 px-4 text-center">{{ $usuario->telefono ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 text-center">
                                        <button
                                            class="py-2 px-4 ml-2 border border-colorgob3 text-sm font-medium text-colorgob3 bg-white hover:bg-colorgob3 hover:text-white"
                                            onclick="location.href='/modificar/{{ $usuario->id }}'">Modificar</button>
                                        <form action="{{ route('usuarios.eliminar', $usuario->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                                                Eliminar
                                            </button>
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
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.');
    }
</script>

</html>
