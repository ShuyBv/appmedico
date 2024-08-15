<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Consultar cita</title>
    <style>
        html,
        body {
            overflow: hidden;
            height: 100%;
        }

        .scrollable-content {
            overflow-y: scroll;
            height: 100%;
            scrollbar-width: thin;
            /* Para Firefox */
            scrollbar-color: white transparent;
            /* Para Firefox */
        }

        .scrollable-content::-webkit-scrollbar {
            width: 8px;
        }

        .scrollable-content::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollable-content::-webkit-scrollbar-thumb {
            background-color: white;
            border-radius: 20px;
            border: 3px solid transparent;
        }


        .flex-row {
            display: flex;
            gap: 16px;
        }

        .flex-col {
            flex: 0.56;
        }

        .custom-width {
            max-width: 750px;
        }

        .medications-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr) auto;
            gap: 8px;
            align-items: center;
        }

        .medications-row input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .medications-row button {
            padding: 8px;
            border-radius: 4px;
            color: #1e3a8a;
            cursor: pointer;
            text-align: center;
        }
    </style>
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
        <a href="/doctor" class=" px-4 py-4 font-medium text-colorgob3 hover:text-colorgob3">Agenda</a>
        <a href="/docPacientes" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Pacientes</a>
        <a href="/docServicios" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Servicios</a>
        <a href="/docProductos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Productos</a>
        <a href="/docIngresos" class=" px-4 py-4 font-medium text-white hover:text-colorgob3">Ingresos</a>
    </div>

        <div class="flex justify-center items-center h-full" style="margin-top: 80px;">
            <div class="bg-white p-8 mb-4 md:p-10 w-1/2 border border-black">
                <h2 class="text-2xl font-bold text-black text-center mb-6">Consultar cita</h2>
                <form action="{{ route('actualizarCita', ['id' => $cita->id]) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Nombre:</label>
                            <input type="text" name="nombre" value="{{ $cita->paciente->nombre }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm" readonly>
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                            <input type="text" name="apellidos" value="{{ $cita->paciente->apellidos }}"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm" readonly>
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Servicio:</label>
                            <input type="text" name="motivos"
                                value="{{ $cita->tipo_servicio ? $cita->tipo_servicio->nombre : 'N/A' }}"
                                placeholder="Motivo de la cita" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Motivo de la cita:</label>
                            <input type="text" name="motivos" value="{{ $cita->motivos }}"
                                placeholder="Motivo de la cita" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                        </div>
                        <div class="col-span-2 flex-row">
                            <div class="flex-col mb-2">
                                <label class="block text-sm font-medium text-gray-700">Edad:</label>
                                <input type="number" name="edad" value="{{ $cita->paciente->edad }}"
                                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                            <div class="flex-col mb-2">
                                <label class="block text-sm font-medium text-gray-700">Género:</label>
                                <select name="genero" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                                    <option value="Masculino"
                                        {{ $cita->paciente->genero == 'Masculino' ? 'selected' : '' }}>Masculino
                                    </option>
                                    <option value="Femenino"
                                        {{ $cita->paciente->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="Otro" {{ $cita->paciente->genero == 'Otro' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>
                            </div>
                            <div class="flex-col mb-2">
                                <label class="block text-sm font-medium text-gray-700">Altura:</label>
                                <input type="number" step="0.01" name="altura"
                                    value="{{ number_format($cita->paciente->altura, 2) }}"
                                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                            <div class="flex-col mb-2">
                                <label class="block text-sm font-medium text-gray-700">Peso:</label>
                                <input type="number" name="peso" value="{{ $cita->paciente->peso }}"
                                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Enfermedades:</label>
                            <input type="text" name="enfermedades" value="{{ $cita->paciente->enfermedades }}"
                                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Alergias:</label>
                            <input type="text" name="alergias" value="{{ $cita->paciente->alergias }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                        </div>


                        <div class="col-span-2 flex-row">
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Temperatura:</label>
                                <input type="text" name="temperatura" value="{{ $cita->temperatura }}"
                                    placeholder="Temperatura" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Presión arterial:</label>
                                <input type="text" name="presion_arterial" value="{{ $cita->presion_arterial }}"
                                    placeholder="Presión arterial" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Frecuencia Cardiaca:</label>
                                <input type="text" name="fc"
                                    placeholder="Frecuencia cardiaca" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-2 flex-row">
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Frecuencia respiratoria:</label>
                                <input type="text" name="fr"
                                    placeholder="Frecuencia respiratoria" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Glucosa:</label>
                                <input type="text" name="gl"
                                    placeholder="Glucosa" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">SPO2%</label>
                                <input type="text" name="SPO2%"
                                    placeholder="SPO2%" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-2 mb-2">
                            <label class="block text-sm font-medium text-gray-700">Probable diagnóstico:</label>
                            <textarea name="diagnostico" placeholder="Diagnóstico" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">{{ $cita->diagnostico }}</textarea>
                        </div>
                        <div class="col-span-2 mb-2">
                            <label class="block text-sm font-medium text-gray-700">Asignar enfermera:</label>
                            <select id="enfermeraSelect" name="enfermera_id" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm select2"
                                onchange="updateTotal()">
                                <option value="">Seleccione una enfermera</option>
                                @foreach ($enfermeras as $enfermera)
                                    <option value="{{ $enfermera->id }}" data-sueldo="{{ $enfermera->sueldo }}"
                                        {{ $cita->enfermera_id == $enfermera->id ? 'selected' : '' }}>
                                        {{ $enfermera->nombre_completo }} - ${{ $enfermera->sueldo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Fecha de la cita:</label>
                            <input type="date" name="fecha" value="{{ $cita->fecha->format('Y-m-d') }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700">Hora de la cita:</label>
                            <input type="time" name="hora" value="{{ date('H:i', strtotime($cita->hora)) }}"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                        </div>
                        <div class="col-span-2 mb-2">
                            <label class="block text-sm font-medium text-gray-700">Orden de estudios:</label>
                            <div id="estudiosFields" class="space-y-2">
                                @foreach (explode(',', $cita->estudios) as $estudio)
                                    <div class="flex items-center">
                                        <input type="text" name="estudios[]" value="{{ $estudio }}"
                                            placeholder="Estudio" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                                        <button type="button" onclick="removeField(this)"
                                            class="ml-2 text-2xl font-bold text-blue-800">-</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" onclick="addEstudioField()" class="block text-sm font-medium text-gray-700">+
                                Añadir más</button>
                        </div>

                        <div class="col-span-2 mb-2">
                            <label class="block text-sm font-medium text-gray-700">Receta:</label>
                            <div id="medicationFields" class="space-y-2">
                                @if (!is_null($cita->medicamentos))
                                    @php
                                        $medicamentos = json_decode($cita->medicamentos, true);
                                    @endphp
                                    @foreach ($medicamentos as $medicamento)
                                        <div class="medications-row">
                                            <input type="text" name="medicamentos[]"
                                                value="{{ $medicamento['medicamento'] }}" placeholder="Medicamento"
                                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                                            <input type="text" name="dosis[]" value="{{ $medicamento['dosis'] }}"
                                                placeholder="Dosis" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                                            <input type="text" name="frecuencia[]"
                                                value="{{ $medicamento['frecuencia'] }}" placeholder="Frecuencia"
                                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                                            <input type="text" name="duracion[]"
                                                value="{{ $medicamento['duracion'] }}" placeholder="Duración"
                                                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
                                            <button type="button" onclick="removeField(this)"
                                                class="ml-2 text-2xl font-bold text-blue-800">-</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" onclick="addMedicationField()" class="block text-sm font-medium text-gray-700">+ Añadir
                                más</button>
                        </div>

                        <!-- Productos usados -->
                        <div class="col-span-2 grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Productos:</label>
                                <div id="productFields" class="space-y-2">
                                    @php
                                        $productosData = json_decode($cita->productos, true) ?? [];
                                    @endphp
                                    @foreach ($productosData as $producto)
                                        <div class="flex items-center mt-2">
                                            <select name="productos[]" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm select2"
                                                onchange="updateTotal()">
                                                <option value="">Selecciona un producto</option>
                                                @foreach ($productos as $item)
                                                    <option value="{{ $item->id }}"
                                                        data-precio="{{ $item->costo }}"
                                                        {{ $producto['id'] == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }} - ${{ $item->costo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="number" name="cantidades[]" value="{{ $producto['cantidad'] }}"
                                                placeholder="Cantidad" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm ml-2"
                                                min="1" onchange="updateTotal()">
                                            <button type="button" onclick="removeField(this)"
                                                class="ml-2 text-2xl font-bold text-blue-800">-</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" onclick="addProductField()" class="block text-sm font-medium text-gray-700">+
                                    Añadir más</button>
                            </div>

                            <input type="hidden" id="priceOfNurse" name="priceOfNurse">


                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Precio del servicio:</label>
                                <input type="text" id="servicePrice"
                                    value="{{ $servicio ? $servicio->precio : 0 }}"
                                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm" readonly>
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700">Total:</label>
                                <input type="text" id="total" name="total" value="{{ $cita->total }}"
                                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <button type="button" style="margin-right: 16px;"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-grisgob1 text-sm font-medium text-grisgob1 bg-white hover:bg-grisgob1 hover:text-white"
                            onclick="location.href='/expediente/{{ $cita->id_paciente }}'">
                            Ver
                        </button>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-colorgob3 text-sm font-medium text-colorgob3 bg-white hover:bg-colorgob3 hover:text-white">
                            Guardar
                        </button>
                        <button type="button" style="margin-right: 16px;"
                            class="w-full flex justify-center py-2 px-4 ml-2 border border-colorgob1 text-sm font-medium text-colorgob1 bg-white hover:bg-colorgob1 hover:text-white"
                            onclick="window.location.href='{{ route('generate.pdf', ['id' => $cita->id]) }}'">
                            Descargar
                        </button>
                    </div>
                </form>
            </div>
            <div id="opinionModal"
                class="fixed inset-0 z-50 bg-gray-600 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
                    <div class="text-center">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Pedir una Opinión</h3>
                        <p class="text-sm text-gray-500 mb-4">¿A qué doctor deseas pedir una opinión?</p>
                        <form action="{{ route('enviar.opinion') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cita_id" value="{{ $cita->id }}">
                            <select id="doctorSelect" name="doctor_id" class="select2 w-full mb-4 p-2 text-base border rounded-md">
                                @foreach ($doctores as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->nombre_completo }}</option>
                                @endforeach
                            </select>                            

                            <!-- Textarea para escribir el mensaje -->
                            <textarea name="mensaje" class="w-full p-2 border border-gray-300 rounded-md mb-4"
                                placeholder="Escribe tu mensaje..."></textarea>

                            <!-- Botones -->
                            <div class="flex justify-between mt-4">
                                <button type="button" id="closeModal"
                                    class="w-1/3 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-400">Cerrar</button>
                                <button type="submit"
                                    class="w-1/3 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-400">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <script>
        function addMedicationField() {
            var container = document.getElementById('medicationFields');
            var div = document.createElement('div');
            div.className = 'medications-row mt-2';
            div.innerHTML = `
        <input type="text" name="medicamentos[]" placeholder="Medicamento" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
        <input type="text" name="dosis[]" placeholder="Dosis" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
        <input type="text" name="frecuencia[]" placeholder="Frecuencia" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
        <input type="text" name="duracion[]" placeholder="Duración" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm">
        <button type="button" onclick="removeField(this)" class="ml-2 text-2xl font-bold text-blue-800">-</button>
    `;
            container.appendChild(div);
        }

        function addEstudioField() {
            var container = document.getElementById('estudiosFields');
            var div = document.createElement('div');
            div.className = 'flex items-center mt-2';
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'estudios[]';
            input.placeholder = 'Estudio';
            input.className = 'mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm';
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'ml-2 text-2xl font-bold text-blue-800';
            button.textContent = '-';
            button.onclick = function() {
                removeField(button);
            };
            div.appendChild(input);
            div.appendChild(button);
            container.appendChild(div);
        }

        function addProductField() {
            var container = document.getElementById('productFields');
            var div = document.createElement('div');
            div.className = 'flex items-center mt-2';

            var select = document.createElement('select');
            select.name = 'productos[]';
            select.className = 'mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm';
            select.setAttribute('onchange', 'updateTotal(this)');
            var option = document.createElement('option');
            option.value = '';
            option.text = 'Selecciona un producto';
            select.appendChild(option);

            @foreach ($productos as $producto)
                var option = document.createElement('option');
                option.value = '{{ $producto->id }}';
                option.text = '{{ $producto->nombre }} - {{ $producto->costo }}';
                option.setAttribute('data-precio', '{{ $producto->costo }}');
                select.appendChild(option);
            @endforeach

            var input = document.createElement('input');
            input.type = 'number';
            input.name = 'cantidades[]';
            input.placeholder = 'Cantidad';
            input.className = 'mt-1 block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm ml-2';
            input.setAttribute('min', 1);
            input.setAttribute('onchange', 'updateTotal()');

            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'ml-2 text-2xl font-bold text-blue-800';
            button.textContent = '-';
            button.onclick = function() {
                removeField(button);
            };

            div.appendChild(select);
            div.appendChild(input);
            div.appendChild(button);
            container.appendChild(div);
        }

        function removeField(button) {
            const field = button.parentNode;
            field.parentNode.removeChild(field);
            updateTotal();
        }

        function updateQuantityOptions(select) {
            const selectedOption = select.options[select.selectedIndex];
            const stock = selectedOption.getAttribute('data-stock');
            const quantityInput = select.nextElementSibling;

            quantityInput.setAttribute('max', stock);
            quantityInput.setAttribute('min', 1);
            quantityInput.value = 1;

            updateTotal();
        }

        function validateQuantity(input) {
            const max = input.getAttribute('max');
            const min = input.getAttribute('min');
            if (parseInt(input.value) > parseInt(max)) {
                input.value = max;
            } else if (parseInt(input.value) < parseInt(min)) {
                input.value = min;
            }
            updateTotal();
        }

        function updateTotal() {
            const productFields = document.querySelectorAll('#productFields > div');
            let total = 0;

            productFields.forEach(field => {
                const selectElement = field.querySelector('select');
                const price = parseFloat(selectElement.options[selectElement.selectedIndex].dataset.precio || 0);
                const quantity = parseFloat(field.querySelector('input').value || 0);
                total += price * quantity;
            });

            const servicePrice = parseFloat(document.getElementById('servicePrice').value || 0);
            total += servicePrice;

            const selectedEnfermera = document.getElementById('enfermeraSelect');
            const enfermeraSueldo = parseFloat(selectedEnfermera.options[selectedEnfermera.selectedIndex].dataset.sueldo ||
                0);
            total += enfermeraSueldo;

            document.getElementById('total').value = total.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTotal();
            document.querySelectorAll('input[name="cantidades[]"], select[name="productos[]"]').forEach(function(
                element) {
                element.addEventListener('input', updateTotal);
                element.addEventListener('change', updateTotal);
            });
        });

        $(document).ready(function() {
            $('.select2').select2();

            $('#opinionModal').addClass('hidden');

            $('#pedirOpinionBtn').on('click', function() {
                $('#opinionModal').removeClass('hidden');
            });

            $('#closeModal').on('click', function() {
                $('#opinionModal').addClass('hidden');
            });
        });
    </script>
</body>

</html>
