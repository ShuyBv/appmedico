<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ingresos Diarios</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var inputSearch = document.querySelector('.search-input');
            var tbody = document.querySelector('tbody');

            inputSearch.addEventListener('change', function (e) {
                var selectedDate = e.target.value.trim();

                var rows = tbody.getElementsByTagName('tr');

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];

                    var dateCell = row.querySelector('.fecha-dia');
                    if (dateCell) {
                        var rowDate = dateCell.textContent.trim();
                        if (rowDate === selectedDate) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; background-attachment: scroll; height: 100vh; margin: 0; padding: 0;">
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
        <a href="/docPacientes" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Pacientes</a>
        <a href="/docServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/docProductos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
        <a href="/docIngresos" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Ingresos</a>
    </div>

        <div class="flex-1 flex flex-col p-6">

            <div class="flex-1 flex flex-col p-6">
                <div class="flex justify-end m-2 items-center">
                    <h2 class="text-2xl font-bold text-black">Total: ${{ $totalGeneral }}</h2>
                </div>
                
                @foreach ($ingresos as $fecha => $data)
                    <table class="min-w-full bg-white border border-gray-300 shadow-xl text-gray-700">
                        <thead>
                            <tr class="bg-white border border-gray-300">
                                <th class="py-2 px-4 text-left">Comprador</th>
                                <th class="py-2 px-4 text-left">Servicio</th>
                                <th class="py-2 px-4 text-left">Cita</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['ventas'] as $venta)
                                <tr class="border border-gray-100 hover:bg-grisgob2">
                                    <td class="py-2 px-4 fecha-dia" style="display:none;">{{ $fecha }}</td>
                                    <td class="py-2 px-4">{{ $venta->paciente->nombre }}</td>
                                    <td class="py-2 px-4">${{ $venta->total_pago }}</td>
                                    <td class="py-2 px-4">-</td>
                                </tr>
                            @endforeach
                            @foreach ($data['citas'] as $cita)
                                <tr class="border border-gray-100 hover:bg-grisgob2">
                                    <td class="py-2 px-4 fecha-dia" style="display:none;">{{ $fecha }}</td>
                                    <td class="py-2 px-4">{{ $cita->paciente->nombre }}</td>
                                    <td class="py-2 px-4">-</td>
                                    <td class="py-2 px-4">${{ $cita->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border border-gray-300 bg-gray-300">
                                <td class="py-2 px-4 font-bold text-black text-right"></td>
                                <td class="py-2 px-4 font-bold text-black text-right" colspan="2">Corte del día: {{ $fecha }} Total: ${{ $data['totalDia'] }}</td>
                            </tr>
                        </tfoot>
                    </table>
                @endforeach
                
            </div>
        </div>
    </div>
</body>

</html>
