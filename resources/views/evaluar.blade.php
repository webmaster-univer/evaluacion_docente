<x-app-layout>

<!-- Inicio de header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Univer') }}
        </h2>
    </x-slot>
<!-- Fin de header -->

<!-- Inicio Template -->
    <main class="flex-1 pt-2">
        <!-- Placeholder Cards -->
        <form method="POST" action="{{ route('principal.update',$docente->id) }}" aria-label="{{ __('Evaluacion') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

<!--*************************************   Informacion docente a evaluar   ****************************************-->
        <div class="p-4 text-white bg-blue-500 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <span class="text-3xl font-semibold tracking-wider uppercase">Docente - {{$docente->nombre_completo}} - Materia - {{$docente->descripcion}}</span>
            </div>
        </div>

        <div class="">
            <div class='flex max-w-xl w-full bg-blue-500 overflow-hidden mx-auto'>
        
                <div class='flex items-center px-6 py-6'>
                    
                    <div class='mx-4'>
                        <p class='text-blue-600'>@ayamsayur</p>
                        <p class='text-gray-400'>ayam sayur</p>                
                    </div>
                    <div class='mx-2'>
                        <p class='text-purple-900 font-bold'>289</p>
                        <p class='text-purple-300'>posts</p>                
                    </div>
                    <div class='mx-2'>
                        <p class='text-purple-900 font-bold'>2.3k</p>
                        <p class='text-purple-300'>followers</p>                
                    </div>
                    <div class='mx-2'>
                        <p class='text-purple-900 font-bold'>12%</p>
                        <p class='text-purple-300'>engagement</p>                
                    </div>
                    <div class='mx-4'>
                        <button class="bg-green-400 text-green-100 px-4 py-1 rounded">details</button>              
                    </div>
                </div>
            </div>
        </div>
<!--*************************************   Fin de contenedor   ****************************************************-->
<!--*************************************   Inicio de preguntas  ***************************************************-->
        @foreach($preguntas as $pregunta)
        <div class="flex items-center justify-center p-4 mt-4 bg-red-500 rounded-md shadow-md">
            <span class="text-xl tracking-wider  uppercase">{{$pregunta->descripcion}}</span>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2">


                @foreach($respuestas as $respuesta)
                @if($respuesta->pregunta_id == $pregunta->id)
            <div class="flex items-center justify-center w-full h-32 bg-white rounded-md shadow-md">
                <span class="text-xl tracking-wider text-gray-500 uppercase">{{$respuesta->descripcion}}   -</span>

                    <input required  type="radio" value="{{$respuesta->puntos}}" name="pregunta{{$respuesta->pregunta_id}}" id="pregunta{{$respuesta->pregunta_id}}"   class="form-radio h-5 w-5 text-blue-600" ><span class="ml-2 text-gray-700"></span>

            </div>

                @endif
            @endforeach


        </div>
        @endforeach
        <div class="grid grid-cols-1 gap-6 my-4 mt-4">



        </div>
            <div class="pt-4 flex items-center space-x-4">
                <button class="bg-red-500 flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancelar
                </button>
                <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Calificar</button>
            </div>
        </form>
    </main>
                <!-- Inicio Template -->
            </div>
        </div>
    </div>
</x-app-layout>
