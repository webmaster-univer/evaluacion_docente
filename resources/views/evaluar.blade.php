<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Univer') }}
        </h2>
    </x-slot>
<!-- Inicio Template -->
    <main class="flex-1 pt-2">
        <!-- Placeholder Cards -->
        <div class="p-4 text-white bg-blue-500 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <span class="text-3xl font-semibold tracking-wider uppercase">Docente - {{$docente->nombre_completo}} - Materia - {{$docente->descripcion}}</span>
            </div>
        </div>
        @foreach($preguntas as $pregunta)
        <div class="flex items-center justify-center p-4 mt-4 bg-white rounded-md shadow-md">
            <span class="text-xl tracking-wider text-gray-500 uppercase">{{$pregunta->pregunta}}</span>
        </div>
        <div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2">


            <div class="flex items-center justify-center w-full h-32 bg-white rounded-md shadow-md">
                <span class="text-xl tracking-wider text-gray-500 uppercase">placeholder</span>
            </div>

            <div class="flex items-center justify-center w-full h-32 bg-white rounded-md shadow-md">
                <span class="text-xl tracking-wider text-gray-500 uppercase">placeholder</span>
            </div>

            <div class="flex items-center justify-center w-full h-32 bg-white rounded-md shadow-md">
                <span class="text-xl tracking-wider text-gray-500 uppercase">placeholder</span>
            </div>

            <div class="flex items-center justify-center w-full h-32 bg-white rounded-md shadow-md">
                <span class="text-xl tracking-wider text-gray-500 uppercase">placeholder</span>
            </div>
        </div>
        @endforeach
        <div class="grid grid-cols-1 gap-6 my-4 mt-4">



        </div>
    </main>
                <!-- Inicio Template -->
            </div>
        </div>
    </div>
</x-app-layout>
