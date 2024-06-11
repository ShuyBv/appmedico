<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Pacientes</title>
</head>


<body style="background-image: url('img/fondo.png'); background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="bg-url('img/logomx.svg'); flex justify-between items-center bg-colorgob2 p-4">
        <img src="/img/logomx.svg" alt="Logo" class="h-10 w-auto">
        <span class="text-white text-2xl font-bold">Consultorio del Bienestar</span>
        <div class="flex space-x-8">
            <a href="https://www.gob.mx/" class="text-white text-xl hover:text-white">Cerrar sesion</a>
        </div>
    </header>

    <div class="flex items-center justify-center h-screen" style="margin-top: -45px;">
        <div class="bg-white bg-opacity-75 p-8 rounded-lg shadow-md w-full max-w-3xl">
            <h2 class="text-3xl font-bold text-black> text-center mb-4">Datos del paciente</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-2">
                    <label class="block font-medium text-black>">Nombre:</label>
                    <p class="text-gray-900">Jose Guadalupe</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Apellidos:</label>
                    <p class="text-gray-900">Martinez Herrera</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Edad:</label>
                    <p class="text-gray-900">20</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Género:</label>
                    <p class="text-gray-900">Masculino</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Altura:</label>
                    <p class="text-gray-900">1.54</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Peso:</label>
                    <p class="text-gray-900">63kg</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Enfermedades:</label>
                    <p class="text-gray-900">Negadas</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Alergias:</label>
                    <p class="text-gray-900">Negadas</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Teléfono:</label>
                    <p class="text-gray-900">834 304 2646</p>
                </div>
                <div class="mb-2">
                    <label class="block font-medium text-black>">Correo:</label>
                    <p class="text-gray-900">josemtz@gmail.com</p>
                </div>
            </div>
            <div class="col-span-2 flex justify-between mt-6">
                <button type="button"
                    style="margin-right: 16px;" 
                    class="w-1/3 flex justify-center py-2 px-4 border border-colorgob1 text-bs font-medium text-colorgob1 hover:bg-colorgob1 hover:text-white" onclick="location.href='/expediente'">
                    Expediente
                </button>
                <button type="button"
                    class="w-1/3 flex justify-center py-2 px-4 border border-grisgob1 text-bs font-medium text-grisgob1 hover:bg-grisgob1 hover:text-white"  onclick="location.href='/doctor'">
                    Regresar
                </button>
            </div>
        </div>
    </div>
</body>

</html>