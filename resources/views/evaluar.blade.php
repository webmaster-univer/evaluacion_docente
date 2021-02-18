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
        <div class="flex items-center justify-center p-4 mt-4 bg-red-500 rounded-md shadow-md">
            <span class="text-xl tracking-wider  uppercase">{{$pregunta->descripcion}}</span>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2">


                @foreach($respuestas as $respuesta)
                @if($respuesta->pregunta_id == $pregunta->id)
            <div class="flex items-center justify-center w-full h-32 bg-white rounded-md shadow-md">
                <span class="text-xl tracking-wider text-gray-500 uppercase">{{$respuesta->descripcion}}</span>

                    <input type="radio" name="pregunta{{$respuesta->pregunta_id}}" id="pregunta{{$respuesta->pregunta_id}}"   class="form-radio h-5 w-5 text-blue-600" ><span class="ml-2 text-gray-700"></span>

            </div>

                @endif
            @endforeach


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
