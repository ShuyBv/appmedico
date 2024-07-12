<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-6 bg-gray-200 p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900 ">Historial de citas</h3>
                    <!-- Buscador 
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" id="search" placeholder="Buscar por nombre de paciente..."
                            class="w-full p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>-->
                    <!-- Tabla -->
                    <div class="overflow-x-auto flex justify-center">
                        <table class="min-w-full bg-white  rounded-lg shadow-md" id="appointmentsTable">
                            <thead>
                                <tr
                                    class="bg-gray-200  text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Fecha</th>
                                    <th class="py-3 px-6 text-left">Hora</th>
                                    <th class="py-3 px-6 text-left">Servicio</th>
                                    <th class="py-3 px-6 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600  text-sm">
                                <tr class="border-b border-gray-200 ">
                                    <td class="py-3 px-6 text-left">Luisana Salas</td>
                                    <td class="py-3 px-6 text-left">01/07/2024</td>
                                    <td class="py-3 px-6 text-left">8:15 a.m.</td>
                                    <td class="py-3 px-6 text-left">Toma de glucosa</td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex space-x-2">
                                            <a href="#"
                                                class="bg-white text-colorgob1 px-4 py-2 border border-colorgob1 hover:bg-colorgob1 hover:text-white">
                                                Confirmar Cita
                                            </a>
                                            <a href="{{ route('consultas') }}"
                                                class="bg-white text-colorgob3 px-4 py-2 border border-colorgob3 hover:bg-colorgob3 hover:text-white">
                                                Generar Consulta
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        document.getElementById('search').addEventListener('input', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#appointmentsTable tbody tr');

            rows.forEach(function (row) {
                let text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
