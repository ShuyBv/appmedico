<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ventas</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <h1 class="text-white text-xl font-bold">Consultorio del Bienestar</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('doctor') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Pacientes</a>
            <a href=" {{ route('registrarCita') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Agendar cita</a>
            <a href=" {{ route('agenda') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Agenda</a>
            <a href=" {{ route('productos') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Productos</a> 
            <a href=" {{ route('servicios') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Servicios</a> 
            <a href=" {{ route('ventas') }} " class=" px-4 py-4 text-white hover:text-colorgob3">Ventas</a> 
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class=" text-white text-xl hover:text-white ">Cerrar sesión</a>
        </div>
    </header>
    
    <div class="flex items-center justify-center h-screen" style="margin-top: -60px;">
        <div class="bg-opacity-75 p-8 md:p-10 border border-black shadow-xl flex flex-col items-center w-full max-w-2xl" style="background: #ffffff;"> 
            <h2 class="text-3xl font-bold">Vender producto</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4" action=" {{ route('registrar-servicio') }} " method="POST">
                @csrf
                <div>
                    <label for="fechaVenta" class="block text-sm font-medium">Fecha</label>
                    <input type="date" name="fechaVenta" id="fechaVenta"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="producto" class="block text-sm font-medium">Producto</label>
                    <select name="producto" id="producto" class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="sin-elegir" >Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option id="{{ $producto->nombreProducto }}" value="{{ $producto->id }}" data-price="{{ $producto->precio }}">{{ $producto->nombreProducto }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="cantidadVendida" class="block text-sm font-medium">Cantidad</label>
                    <input type="number" name="cantidadVendida" id="cantidadVendida" 
                        placeholder = "Cantidad Vendida"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="precioUnitario" class="block text-sm font-medium">Precio Unitario</label>
                    <input type="text" name="precioUnitario" id="precioUnitario" 
                        placeholder = "Precio Unitario"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        readonly>
                </div>
                <div>
                    <label for="total" class="block text-sm font-medium">Total</label>
                    <input type="text" name="total" id="total" 
                        placeholder = "Total"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        readonly>
                </div>
                <div class="col-span-2 flex justify-center">
                    <button type="submit"
                        style="margin-right: 16px;"
                        class="border border-colorgob1 text-bs text-colorgob1 hover:bg-colorgob1 hover:text-white px-10 py-2 mr-2">
                        Vender
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var selectProducto = document.getElementById('producto');
            var precioUnitario = document.getElementById('precioUnitario'); 

            selectProducto.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var precio = selectedOption.getAttribute('data-price');

                if (precio) {
                    precioUnitario.value = '$' + precio; 
                } else {
                    precioUnitario.value = '$0.00'; 
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var cantidadVendida = document.getElementById('cantidadVendida');
            var precioUnitario = document.getElementById('precioUnitario');
            var total = document.getElementById('total');

            function calcularTotal() {
                var cantidad = parseFloat(cantidadVendida.value);
                var precio = parseFloat(precioUnitario.value.replace('$', '')); 
                var totalCalculado = (cantidad * precio).toFixed(2); 
                total.value = '$' + totalCalculado; 
            }

            cantidadVendida.addEventListener('change', calcularTotal);
            precioUnitario.addEventListener('change', calcularTotal);

            if (cantidadVendida.value && precioUnitario.value) {
                calcularTotal();
            }
        });
    </script>
</body>
</html>
