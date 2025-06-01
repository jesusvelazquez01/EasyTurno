<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Hoy es {{ \Carbon\Carbon::now()->translatedFormat('l d \\d\\e F \\d\\e Y') }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Salas de Informatica 🖥️
            </h2>
        </div>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">
        <!-- Formulario para agregar una nueva sala -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <form action="{{ route('salas.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <!-- Nombre -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="nombre" id="nombre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="nombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                    </div>

                    <!-- Ubicación -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="ubicacion" id="ubicacion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="ubicacion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ubicación</label>
                    </div>

                    <!-- Equipos -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="equipos" id="equipos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="equipos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad de Equipos</label>
                    </div>

                    <!-- Disponibilidad -->
                    <div class="relative z-0 w-full mb-5 group">
                        <select name="disponibilidad" id="disponibilidad" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                            <option value="Disponible">Disponible</option>
                            <option value="Ocupada">No Disponible</option>
                        </select>
                        <label for="disponibilidad" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Disponibilidad</label>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Agregar Sala
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" id="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Lista de salas existentes -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4">Salas Registradas</h3>

            @if($salas->count() > 0)
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b p-3 text-sm font-medium text-gray-600">ID:</th>
                            <th class="border-b p-3 text-sm font-medium text-gray-600">Nombre</th>
                            <th class="border-b p-3 text-sm font-medium text-gray-600">Ubicación</th>
                            <th class="border-b p-3 text-sm font-medium text-gray-600">Equipos</th>
                            <th class="border-b p-3 text-sm font-medium text-gray-600">Disponibilidad</th>
                            <th class="border-b p-3 text-sm font-medium text-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salas as $sala)
                            <tr>
                                <td class="border-b p-3 text-center text-gray-500">{{ $sala->id }}</td>
                                <td class="border-b p-3 text-center">{{ $sala->nombre }}</td>
                                <td class="border-b p-3 text-center">{{ $sala->ubicacion }}</td>
                                <td class="border-b p-3 text-center">{{ $sala->equipos }}</td>
                                <td class="border-b p-3 text-center">{{ $sala->disponibilidad }}</td>
                                <td class="border-b p-3 flex space-x-2 justify-center">
                                    <!-- Botón Editar -->
                                    <button 
                                        onclick="openModal('{{ $sala->id }}','{{ $sala->nombre }}', '{{ $sala->ubicacion }}', '{{ $sala->equipos }}', '{{ $sala->disponibilidad }}')" 
                                        class="text-gray-500 hover:text-yellow-500 w-8 h-8 flex items-center justify-center" 
                                        title="Editar Sala">
                                        <i class="ri-edit-line"></i>
                                    </button>

                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('salas.destroy', $sala->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta sala?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                             class="text-gray-500 hover:text-red-500 w-8 h-8 flex items-center justify-center">
                                          <i class="ri-delete-bin-line"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-500">No hay salas registradas.</p>
            @endif
        </div>
    </div>

    <!-- Modal de Edición -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-900 p-6 rounded-lg w-96 relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                ✖
            </button>

            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Editar Sala</h2>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="editId">

                <div class="mb-4">
                    <label for="editNombre" class="block mb-1 text-gray-700 dark:text-gray-300">Nombre</label>
                    <input type="text" name="nombre" id="editNombre" required class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-gray-800 dark:text-white" />
                </div>

                <div class="mb-4">
                    <label for="editUbicacion" class="block mb-1 text-gray-700 dark:text-gray-300">Ubicación</label>
                    <input type="text" name="ubicacion" id="editUbicacion" required class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-gray-800 dark:text-white" />
                </div>

                <div class="mb-4">
                    <label for="editEquipos" class="block mb-1 text-gray-700 dark:text-gray-300">Cantidad de Equipos</label>
                    <input type="number" name="equipos" id="editEquipos" required class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-gray-800 dark:text-white" />
                </div>

                <div class="mb-4">
                    <label for="editDisponibilidad" class="block mb-1 text-gray-700 dark:text-gray-300">Disponibilidad</label>
                    <select name="disponibilidad" id="editDisponibilidad" required class="w-full px-3 py-2 border border-gray-300 rounded dark:bg-gray-800 dark:text-white">
                        <option value="Disponible">Disponible</option>
                        <option value="Ocupada">No Disponible</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Abrir modal y llenar formulario con datos
        function openModal(id, nombre, ubicacion, equipos, disponibilidad) {
            document.getElementById('editId').value = id;
            document.getElementById('editNombre').value = nombre;
            document.getElementById('editUbicacion').value = ubicacion;
            document.getElementById('editEquipos').value = equipos;
            document.getElementById('editDisponibilidad').value = disponibilidad;

            // Ajustar la acción del formulario con el id para el método PUT
            const form = document.getElementById('editForm');
            form.action = `/salas/${id}`;

            // Mostrar modal
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        // Cerrar modal
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
