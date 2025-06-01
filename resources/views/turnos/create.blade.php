<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Hoy es {{ \Carbon\Carbon::now()->translatedFormat('l d \\d\\e F \\d\\e Y') }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Turnos 🎫
            </h2>

        </div>
    </x-slot>

    @if(session('success'))
        <div class="flex items-center bg-green-100 border border-green-400 text-green-700 px-5 py-3 rounded mb-4" role="alert" id="alert-success">
            <svg class="fill-current w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M0 11l2-2 5 5L18 3l2 2-13 13z"/>
            </svg>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
   <div class="py-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
        <form action="{{ route('turnos.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-2 gap-6">
                <!-- Número de Turno -->
                <div class="relative z-0 w-full group">
                    <input type="number" name="nro_turno" id="nro_turno"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="nro_turno"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Número de Turno
                    </label>
                </div>

                <!-- Profesor -->
                <div class="relative z-0 w-full group">
                    <input type="text" name="profesor" id="profesor"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="profesor"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Profesor
                    </label>
                </div>

                <!-- Email -->
                <div class="relative z-0 w-full group">
                    <input type="email" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email
                    </label>
                </div>

                <!-- Carrera -->
                <div class="relative z-0 w-full group">
                    <select name="carrera" id="carrera"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        
                        <option value="">-- Seleccione una carrera --</option>
                    <option value="Tec.Sup en Enfermeria">Tec.Sup en Enfermeria</option>
                    <option value="Tec.Sup en Desarrollo de Software">Tec.Sup. en Desarrollo de Software</option>
                    <option value="Tec.sup en Inteligencia Artificial y Ciencia de Datos">Tec.sup en Inteligencia Artificial y Ciencia de Datos</option>
                    <option value="Tec.Sup en Gerontologia">Tec.Sup en Gerontologia</option>
                    <option value="Tec.Sup. en Periodismo">Tec.Sup. en Periodismo</option>
                    <option value="Tec.Sup. Finanzas y nuevas">Tec.Sup. Finanzas y nuevas</option>
                    </select>
                    <label for="carrera"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Carrera
                    </label>
                </div>

                <!-- Hora Entrada/Salida y Fecha -->
                <div class="relative z-0 w-full group">
                    <input type="time" name="entrada" id="entrada"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="entrada"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Hora de Entrada
                    </label>
                </div>

                <div class="relative z-0 w-full group">
                    <input type="time" name="salida" id="salida"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="salida"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Hora de Salida
                    </label>
                </div>

                <div class="relative z-0 w-full group">
                    <input type="date" name="fecha" id="fecha"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="fecha"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Fecha
                    </label>
                </div>

                <!-- Sala Informática -->
                <div class="relative z-0 w-full group">
                    <select name="sala_informatica_id" id="sala_informatica_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        @foreach($salas as $sala)
                            <option value="{{ $sala->id }}">{{ $sala->nombre }}</option>
                        @endforeach
                    </select>
                    <label for="sala_informatica_id"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Sala de Informática
                    </label>
                </div>
            </div>

            <!-- Botón mantener estilos original -->
            <button type="submit"
                class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Agendar Turno
            </button>
        </form>
    </div>
</div>

<div class="py-6 max-w-6xl mx-auto">
    <table class="min-w-full bg-white shadow-md rounded overflow-hidden">
        <thead class="bg-gray-500 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Nro</th>
                <th class="py-3 px-4 text-left">Profesor</th>
                <th class="py-3 px-4 text-left">Carrera</th>
                <th class="py-3 px-4 text-left">Email</th>
                <th class="py-3 px-4 text-left">Entrada</th>
                <th class="py-3 px-4 text-left">Salida</th>
                <th class="py-3 px-4 text-left">Fecha</th>
                <th class="py-3 px-4 text-left">Sala</th>
                <th class="py-3 px-4 text-center">Acciones</th>
            </tr>
            <!-- Fila de filtros solo para Profesor (col 1) y Fecha (col 6) -->
            <tr class="bg-gray-300">
                <th class="py-2 px-4"></th>
                <th class="py-2 px-4">
                    <input 
                        type="text" 
                        id="filter-profesor" 
                        class="filter-input w-full text-black" 
                        data-col="1" 
                        placeholder="Filtrar Profesor"
                    >
                </th>
                <th class="py-2 px-4"></th>
                <th class="py-2 px-4"></th>
                <th class="py-2 px-4"></th>
                <th class="py-2 px-4"></th>
                <th class="py-2 px-4">
                    <input 
                        type="date" 
                        id="filter-fecha" 
                        class="filter-input w-full text-black" 
                        data-col="6" 
                        placeholder="Filtrar Fecha"
                    >
                </th>
                <th class="py-2 px-4"></th>
                <th class="py-2 px-4"></th>
            </tr>
        </thead>
        <tbody id="turnos-list">
            @forelse ($turnos as $turno)
                <tr id="turno-{{ $turno->id }}" class="border-t">
                    <td class="py-3 px-4">{{ $turno->nro_turno }}</td>
                    <td class="py-3 px-4">{{ $turno->profesor }}</td>
                    <td class="py-3 px-4">{{ $turno->carrera }}</td>
                    <td class="py-3 px-4">{{ $turno->email }}</td>
                    <td class="py-3 px-4">{{ $turno->entrada }}</td>
                    <td class="py-3 px-4">{{ $turno->salida }}</td>
                    <td class="py-3 px-4">{{ $turno->fecha }}</td>
                    <td class="py-3 px-4">{{ $turno->sala->nombre ?? 'No asignada' }}</td>
                    <td class="py-3 px-4 text-center space-x-2">
                        <div class="flex space-x-0.5 justify-center">
                            <button 
                                onclick="openModal({{ $turno->id }}, '{{ $turno->profesor }}', '{{ $turno->carrera }}', '{{ $turno->email }}', '{{ $turno->entrada }}', '{{ $turno->salida }}', '{{ $turno->fecha }}')" 
                                class="text-gray-500 hover:text-yellow-500 w-8 h-8 flex items-center justify-center">
                                <i class="ri-edit-line"></i>
                            </button>
                            <form action="{{ route('turnos.destroy', $turno->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este turno?');">
                                @csrf
                                @method('DELETE')               
                                <button type="submit"
                                class="text-gray-500 hover:text-red-500 w-8 h-8 flex items-center justify-center"
                                >
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                             <!-- BOTÓN QUE ABRE EL MODAL -->
                                 <button type="button"
                                        onclick="abrirModal('{{ $turno->id }}', '{{ $turno->email }}')"
                                          class="text-white w-8 h-8 justify-center bg-green-600 hover:bg-green-700 font-semibold py-1 px-3 rounded-lg shadow-md transition duration-200 flex items-center gap-1"
                                            title="Enviar Email">
                                            <i class="ri-mail-send-line"></i>
                                </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="py-4 text-center">No hay turnos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white rounded-lg p-6 w-1/2 shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Editar Turno</h2>
        
        <form id="editForm" method="post">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-2 gap-4">
                <input type="hidden" name="id" id="editId">
                
                <!-- Número de Turno -->
                <div>
                    <label for="nro_turnoModal" class="block text-gray-700 font-medium mb-1">Nro de Turno:</label>
                    <input type="number" id="nro_turnoModal" name="nro_turno"   class="p-2 border rounded w-full" placeholder="Número de Turno">
                </div>

                <!-- Profesor -->
                <div>
                    <label for="profesorModal" class="block text-gray-700 font-medium mb-1">Profesor:</label>
                    <input type="text" id="profesorModal" name="profesor"   class="p-2 border rounded w-full" placeholder="Profesor">
                </div>

                <!-- Carrera -->
                <div>
                    <label for="carreraModal" class="block text-gray-700 font-medium mb-1">Carrera:</label>
                    <input type="text" id="carreraModal" name="carrera" class="p-2 border rounded w-full" placeholder="Carrera">
                </div>

                <!-- Email -->
                <div>
                    <label for="emailModal" class="block text-gray-700 font-medium mb-1">Email:</label>
                    <input type="email" id="emailModal" name="email" class="p-2 border rounded w-full" placeholder="Email">
                </div>

                <!-- Hora de Entrada -->
                <div>
                    <label for="entradaModal" class="block text-gray-700 font-medium mb-1">Entrada:</label>
                    <input type="time" id="entradaModal" name="entrada" class="p-2 border rounded w-full">
                </div>

                <!-- Hora de Salida -->
                <div>
                    <label for="salidaModal" class="block text-gray-700 font-medium mb-1">Salida:</label>
                    <input type="time" id="salidaModal" name="salida" class="p-2 border rounded w-full">
                </div>

                <!-- Fecha -->
                <div>
                    <label for="fechaModal" class="block text-gray-700 font-medium mb-1">Fecha:</label>
                    <input type="date" id="fechaModal" name="fecha" class="p-2 border rounded w-full">
                </div>

                <!-- Sala Informática -->
                <div>
                    <label for="sala_informatica_idModal" class="block text-gray-700 font-medium mb-1">Sala Informática:</label>
                    <select id="sala_informatica_idModal" name="sala_informatica_id" class="p-2 border rounded w-full">
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id }}">{{ $sala->nombre }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- Botones de acción -->
            <div class="mt-6 flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancelar</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL PARA ENVIAR CORRREO -->
<div id="modalEnvio" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">📧 Enviar turno al correo</h2>
        <p class="mb-4">Se enviará el turno al siguiente correo:</p>
        <p class="font-semibold mb-4" id="correoDestino"></p>

        <form id="formEnvio" method="POST">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mr-2">
                Confirmar envío
            </button>
            <button type="button" onclick="cerrarModal()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Cancelar
            </button>
        </form>
    </div>
</div>

<script>
    // Al cargar la página, ponemos la fecha actual en el filtro
    document.addEventListener('DOMContentLoaded', function () {
        const inputFecha = document.getElementById('filter-fecha');
        const today = new Date().toISOString().split('T')[0];  // yyyy-mm-dd
        inputFecha.value = today;
        filtrarTabla();  // filtramos por defecto con la fecha actual
    });

    // Escuchamos cambios en los dos filtros
    document.getElementById('filter-profesor').addEventListener('keyup', filtrarTabla);
    document.getElementById('filter-fecha').addEventListener('change', filtrarTabla);

    function filtrarTabla() {
        const filtroProfesor = document.getElementById('filter-profesor').value.toLowerCase();
        const filtroFecha = document.getElementById('filter-fecha').value;

        const rows = document.querySelectorAll('#turnos-list tr');

        rows.forEach(row => {
            const profesor = row.cells[1]?.textContent.toLowerCase() || '';
            const fecha = row.cells[6]?.textContent || '';

            // Condiciones: Profesor contiene filtroProfesor Y Fecha igual a filtroFecha (si filtroFecha tiene valor)
            const cumpleProfesor = profesor.includes(filtroProfesor);
            const cumpleFecha = filtroFecha ? fecha === filtroFecha : true;

            if (cumpleProfesor && cumpleFecha) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>

<!-- JavaScript -->
<script>
    function abrirModal(id, email) {
        const modal = document.getElementById('modalEnvio');
        const correoDestino = document.getElementById('correoDestino');
        const form = document.getElementById('formEnvio');

        correoDestino.textContent = email;
        form.action = `/turnos/enviar/${id}`; // Asumimos ruta tipo POST /turnos/enviar/{id}

        modal.classList.remove('hidden');
    }

    function cerrarModal() {
        const modal = document.getElementById('modalEnvio');
        modal.classList.add('hidden');
    }
</script>

<script>
    // Función para abrir el modal y cargar los datos
   function openModal(id,nro_turno,profesor, carrera, email, entrada, salida, fecha, sala_informatica_id) {

   document.getElementById('editId').value = id;
    document.getElementById('nro_turnoModal').value = nro_turno;
    document.getElementById('profesorModal').value = profesor;
    document.getElementById('carreraModal').value = carrera;
    document.getElementById('emailModal').value = email;
    document.getElementById('entradaModal').value = entrada;
    document.getElementById('salidaModal').value = salida;
    document.getElementById('fechaModal').value = fecha;
    document.getElementById('sala_informatica_idModal').value = sala_informatica_id;
   
        const form = document.getElementById('editForm');
            form.action = `/turnos/${id}`;

    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');

}


    // Función para cerrar el modal
    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }



  // Cerrar modal con click fuera del contenido
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('editModal');
            if (event.target === modal) {
                closeModal();
            }
        });
</script>  
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const alertBox = document.getElementById('alert-success');
        if(alertBox) {
            setTimeout(() => {
                // Opcional: animación de desvanecimiento suave
                alertBox.style.transition = "opacity 0.5s ease";
                alertBox.style.opacity = '0';

                // Después de la transición, lo quitamos del DOM
                setTimeout(() => alertBox.remove(), 500);
            }, 3000); // Cambia 3000 por la cantidad de ms que quieras que dure visible
        }
    });
</script> 














</x-app-layout>