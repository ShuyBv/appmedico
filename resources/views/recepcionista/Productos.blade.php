<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Productos</title>
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
        <a href="/verPacientes" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Pacientes</a>
        <a href="/Productos" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Productos</a>
    </div>

            <div class="flex-1 flex flex-col p-6">
            <div class="flex justify-end mt-4 items-center">
                <button
                    class="w-3/2 justify-end py-2 px-4 ml-2  border border-colorgob3 text-sm font-medium text-colorgob3 bg-white hover:bg-colorgob3 hover:text-white"
                    onclick="location.href='/vender'">
                    Vender
                </button>
                <button
                    class="w-3/2 justify-end py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white"
                    onclick="location.href='/registrarProducto'">
                    Agregar
                </button>
            </div>

            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white border border-gray-300 shadow-xl text-gray-700">
                    <thead>
                        <tr class="bg-white border border-gray-300">
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Marca</th>
                            <th class="py-2 px-4 text-left">Costo</th>
                            <th class="py-2 px-4 text-left">Cantidad</th>
                            <th class="py-2 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($productos))
                            @foreach ($productos as $producto)
                            <tr class="border border-gray-100 hover:bg-grisgob2">
                                <td class="py-2 px-4">{{ $producto->nombre}}</td>
                                    <td class="py-2 px-4">{{ $producto->marca}}</td>
                                    <td class="py-2 px-4">{{ $producto->costo}}</td>
                                    <td class="py-2 px-4">{{ $producto->cantidad}}</td>
                                    <td class="py-2 px-4 text-center">
                                        <form action="{{ route('Productos.edit', $producto->id) }}" method="get">
                                            <button type="submit" class="inline-flex m-1 justify-center py-2 px-4 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white">Editar</button>
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
