<x-app-layout>
<!-- Inicio de header -->
    <x-slot name="header">

        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">Docente - {{$docente->nombre_completo}} - Materia - {{$docente->descripcion}}</h2>

    </x-slot>
<!-- Fin de header -->

<form method="POST" action="{{ route('principal.update',$docente->id) }}" aria-label="{{ __('Evaluacion') }}" enctype="multipart/form-data">
    @foreach($preguntas as $pregunta)
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead class="justify-between">
                            <tr class="bg-gray-800">
                                    <th class="px-16 py-2">
                                        <span class="text-gray-300">{{$pregunta->descripcion}}</span>
                                    </th>
                                    <th class="px-16 py-2">
                                    </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @foreach($respuestas as $respuesta)
                            @if($respuesta->pregunta_id == $pregunta->id)
                                <tr class="bg-white border-2 border-gray-200">
                                    <td class="px-16 py-3">
                                        <span class="text-center ml-2 font-semibold text-gray-500">{{$respuesta->descripcion}}   -</span>
                                    </td>
                                    <td>
                                        <input required  type="radio" value="{{$respuesta->puntos}}" name="pregunta{{$respuesta->pregunta_id}}" id="pregunta{{$respuesta->pregunta_id}}"   class="form-radio h-5 w-5 text-blue-600" >
                                        <span class="ml-2 text-gray-700"></span>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</form>

    <!--************************************  Botones de cancelar y calificar   *****************************************-->
    <div class="pt-4 flex items-center space-x-4">
        <button class="bg-red-500 flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancelar
        </button>
        <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Calificar</button>
    </div>
<!--************************************  Fin de seccion de botones   ***********************************************-->

</x-app-layout>
