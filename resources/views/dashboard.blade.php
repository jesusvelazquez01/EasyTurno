<x-app-layout>
 <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hoy es {{ \Carbon\Carbon::now()->translatedFormat('l d \\d\\e F \\d\\e Y') }}
        </h2>
        <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 flex items-center space-x-2">
            <x-heroicon-o-ticket class="w-5 h-5 text-white" />
            <a href="{{ route('turnos.create') }}">Solicitar Turno</a>
        </button>
    </div>
</x-slot>
    

   <div class="py-6 space-y-6 max-w-6xl mx-auto">

      {{-- Estado de las salas --}}
<div class="bg-white p-6 rounded-lg shadow mt-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4">🏫 Estado de las Salas</h3>
    
    <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach($salas as $sala)
            <div class="p-4 bg-gray-50 border rounded-lg shadow-sm hover:shadow-md transition duration-300">
                <h4 class="text-md font-semibold text-gray-700">{{ $sala->nombre }}</h4>
                <p class="text-sm text-gray-600 mt-1">📍 {{ $sala->ubicacion }}</p>
                <p class="text-sm text-gray-600 mt-1">💻 Equipos: {{ $sala->equipos }}</p>
                
                <span class="inline-block mt-2 text-xs px-2 py-1 rounded-full
                    {{ $sala->disponibilidad == 'disponible' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                    {{ ucfirst($sala->disponibilidad) }}
                </span>
            </div>
        @endforeach
    </div>
</div>


{{-- Turnos del día --}}
<div class="bg-white p-6 rounded-lg shadow mt-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4">📅 Turnos del Día</h3>

    @if($turnos->isEmpty())
        <p class="text-sm text-gray-600">No hay turnos registrados para hoy.</p>
    @else
        <div class="space-y-4">
            @foreach($turnos as $turno)
                <div class="p-4 bg-gray-50 border rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="flex justify-between items-center flex-wrap gap-y-2">
                        <div>
                            <h4 class="font-semibold text-gray-700">Turno N° {{ $turno->nro_turno }}</h4>
                            <p class="text-sm text-gray-600">👨‍🏫 {{ $turno->profesor }} ({{ $turno->carrera }})</p>
                            <p class="text-sm text-gray-600">🖥️ Sala: {{ $turno->sala->nombre }}</p>
                        </div>
                        <div class="text-right text-sm text-gray-600">
                            <p>🕒 {{ \Carbon\Carbon::parse($turno->entrada)->format('H:i') }} - {{ \Carbon\Carbon::parse($turno->salida)->format('H:i') }}</p>
                            <p>📅 {{ \Carbon\Carbon::parse($turno->fecha)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

    </div>
<div class="w-full max-w-md mx-auto mt-8">
    <div class="bg-white border border-gray-200 shadow-md rounded-xl p-4">
        <button 
            onclick="toggleLista()" 
            class="flex items-center justify-between w-full text-left text-lg font-semibold text-gray-800"
        >
            ¿Qué puedes hacer con este sistema de turnos?
            <svg id="iconoFlecha" class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <ul id="listaOpciones" class="list-disc pl-5 text-sm text-gray-700 space-y-1 mt-3 hidden">
            <li>📝 Cargar turnos y enviarlos fácilmente.</li>
            <li>🔍 Consultar turnos asignados.</li>
            <li>💻 Ver disponibilidad de salas.</li>
            <li>📅 Organizar horarios sin superposición.</li>
            <li>📨 Recibir confirmación automática por email.</li>
        </ul>
    </div>
</div>
<script>
    function toggleLista() {
        const lista = document.getElementById('listaOpciones');
        const flecha = document.getElementById('iconoFlecha');

        lista.classList.toggle('hidden');
        flecha.classList.toggle('rotate-180');
    }
</script>   
</x-app-layout>
