<x-app-layout>
<!-- Inicio de header -->
    <x-slot name="header">

        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">Docente - {{$docente->nombre_completo}} - Materia - {{$docente->descripcion}}</h2>

    </x-slot>
<!-- Fin de header -->

<form method="POST" action="{{ route('principal.update',$docente->id) }}" aria-label="{{ __('Evaluacion') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                                        @if($respuesta->puntos == 0)
                                            <span class="ml-2 text-gray-700">Si</span>
                                            <input required  type="radio" value="1" name="pregunta{{$respuesta->id}}" id="pregunta{{$respuesta->id}}"   class="form-radio h-5 w-5 text-blue-600" >
                                            <span class="ml-2 text-gray-700">No</span>
                                            <input required  type="radio" value="0" name="pregunta{{$respuesta->id}}" id="pregunta{{$respuesta->id}}"   class="form-radio h-5 w-5 text-blue-600" >

                                        @else
                                        <input required  type="radio" value="{{$respuesta->puntos}}" name="pregunta{{$respuesta->pregunta_id}}" id="pregunta{{$respuesta->pregunta_id}}"   class="form-radio h-5 w-5 text-blue-600" >
                                        <span class="ml-2 text-gray-700"></span>

                                        @endif
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
<!--************************************************************   Textarea   ***************************************************************-->

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <label for="observaciones" class="font-semibold text-gray-500">Sugerencias:</label><br>
        <textarea class="resize-none border-gray-300 font-semibold text-gray-800 w-full px-3 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent"></textarea>
    </div>

<!--************************************************************   Botones   ****************************************************************-->
    <div class="flex justify-center">
        <div class="card-body p-4">
            <div class="btn-group">
                <a href="{{route('principal.index')}}">
                    <button type="button" class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-red-500 hover:bg-red-700 text-white font-normal py-6 px-16 mr-5 rounded">Cancelar</button>
                </a>
                <button type="submit" class="btn-primary transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-blue-500 hover:bg-blue-700 text-white font-normal py-6 px-16 mr-5 rounded">Calificar</button>
            </div>
        </div>
    </div>
</form>

</x-app-layout>
