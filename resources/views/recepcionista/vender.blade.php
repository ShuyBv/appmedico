<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ventas</title>
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


        <div class="flex justify-center items-center h-full" style="margin-top: 80px;">
            <div class="bg-white p-8 mb-4 md:p-10 w-1/2 border border-black">
                <div class="my-4">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <h2 class="text-2xl font-bold text-black text-center mb-6">Vender producto</h2>
                <form action="{{ route('vender.store') }}" method="POST">
                    @csrf
                    <fieldset class="mb-4">
                        <legend class="sr-only">Información de la venta</legend>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Producto</label>
                            <select name="nombre_producto" id="nombre_producto"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                required>
                                <option value="">Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-costo="{{ $producto->costo }}">
                                        {{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Comprador</label>
                            <select name="nombre_paciente" id="nombre_paciente"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                required>
                                <option value="">Selecciona un paciente</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Fecha de venta</label>
                            <input type="datetime-local" name="fecha_hora" id="fecha_hora"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                value="{{ now()->format('Y-m-d\TH:i') }}" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                min="1" required>
                        </div>
                        <div class="mb-3 items-center bg-white rounded-md shadow-sm">
                            <label class="block text-sm font-medium text-gray-700">Total</label>
                            <span id="total_pago"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                                style="cursor: default;"></span>
                        </div>
                    </fieldset>
                    <div class="flex-grow flex items-center justify-center mt-3">
                        <button type="button"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white"
                            onclick="location.href='/Productos'">
                            Regresar
                        </button>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white">
                            Vender
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productoSelect = document.getElementById('nombre_producto');
            const cantidadInput = document.getElementById('cantidad');
            const totalPagoSpan = document.getElementById('total_pago');

            const updateTotalPago = () => {
                const costo = productoSelect.options[productoSelect.selectedIndex].dataset.costo || 0;
                const cantidad = cantidadInput.value || 0;
                const totalPago = costo * cantidad;
                totalPagoSpan.textContent = totalPago.toFixed(2);
            };

            productoSelect.addEventListener('change', function() {
                const productoId = this.value;
                fetch(`/venta/max-stock/${productoId}`)
                    .then(response => response.json())
                    .then(data => {
                        cantidadInput.max = data.maxStock;
                        cantidadInput.value = '';
                        totalPagoSpan.textContent = '0.00';
                    })
                    .catch(error => console.error('Error:', error));
            });

            cantidadInput.addEventListener('input', function() {
                const cantidad = parseInt(cantidadInput.value);
                const maxStock = parseInt(cantidadInput.max);

                if (cantidad > maxStock) {
                    alert(`No se puede registrar. Ingrese una cantidad menor o igual a ${maxStock}`);
                    cantidadInput.value = '';
                } else if (cantidad <= 0) {
                    alert('La cantidad debe ser mayor a 0');
                    cantidadInput.value = '';
                }

                updateTotalPago();
            });

            productoSelect.addEventListener('change', updateTotalPago);
        });
    </script>
</body>

</html>
