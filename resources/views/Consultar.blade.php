<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Cita</title>
</head>

<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <a href="{{ route('logout') }}"><button class=" text-white text-xl hover:text-white ">Cerrar sesión</button></a>        
        </div>
    </header>

  
    <div class="flex items-center justify-center h-screen" style="margin-top: 60px;">
        <div class="bg-white bg-opacity-75 p-8 rounded-lg shadow-md w-full max-w-3xl">
            <h2 class="text-2xl font-bold text-black text-center mb-4">Consulta Medica</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-2">
                    <label class="block font-medium text-black">Motivo de la cita:</label>
                    <input type="text" name="motivo" placeholder="Motivo de la cita" class="w-full px-4 py-2 border rounded-md">
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black">Fecha de la cita:</label>
                    <input type="date" name="fecha" class="w-full px-4 py-2 border rounded-md">
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black">Estudios a realizar:</label>
                    <input type="text" name="estudios" placeholder="Estudios a realizar" class="w-full px-4 py-2 border rounded-md">
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black">Hora de la cita:</label>
                    <input type="time" name="hora" class="w-full px-4 py-2 border rounded-md">
                </div>
                <div class="mb-1">
                    <label class="block font-medium text-black">Frecuencia cardiaca:</label>
                    <input type="text" name="fc" class="px-1 py-1 border rounded-md">
                </div>
                <div class="mb-1">
                    <label class="block font-medium text-black">Frecuencia respiratoria:</label>
                    <input type="text" name="fr" class="px-1 py-1 border rounded-md">
                </div>
                <div class="mb-4 col-span-2">
                    <label class="block font-medium text-black">Añadir productos:</label>
                    <form id="medicationsForm">
                        <div id="medicationFields" class="space-y-2">
                            <div class="flex items-center">
                                <input type="text" name="medicamentos[]" placeholder="Productos" class="flex-1 px-4 py-2 border rounded-md">
                            </div>
                        </div>
                        <button type="button" onclick="addMedicationField()" class="mt-2 text-black">+ Añadir más</button>
                    </form>
                </div>
                <div class="mb-4 col-span-2">
                    <label class="block font-medium text-black">Recetar Medicamentos:</label>
                    <form id="medicationsForm">
                        <div id="medicationFields" class="space-y-2">
                            <div class="flex items-center">
                                <input type="text" name="medicamentos[]" placeholder="Medicamento" class="flex-1 px-4 py-2 border rounded-md">
                            </div>
                        </div>
                        <button type="button" onclick="addMedicationField()" class="mt-2 text-black">+ Añadir más</button>
                    </form>
                </div>
            </div>
            <div class="flex justify-between mt-6">
                <button type="button" style="margin-right: 16px;"
                    class="bg-white text-grisgob1 px-4 py-2 border border-grisgob1 hover:bg-grisgob1 hover:text-white" onclick="location.href='/doctor'">
                    Cancelar cita
                </button>
                <button type="button"
                    class="bg-white text-colorgob1 px-4 py-2 border border-colorgob1 hover:bg-colorgob1 hover:text-white">
                    Finalizar cita
                </button>
            </div>
        </div>
    </div>

    <script>
        function addMedicationField() {
            const container = document.getElementById('medicationFields');
            const field = document.createElement('div');
            field.className = 'flex items-center mt-2';
            field.innerHTML = '<input type="text" name="medicamentos[]" placeholder="Medicamento" class="flex-1 px-4 py-2 border rounded-md">';
            container.appendChild(field);
        }
    </script>
</body>

</html>
