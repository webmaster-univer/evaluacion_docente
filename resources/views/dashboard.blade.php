<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Univer') }}
        </h2>
    </x-slot>
    <br>
    @if($finalizo == 1)
        <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">Muchas gracias por tu participación.
            Tus respuestas nos sirven para mejorar.</h1>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <!-- ******************************   Inicia tabla   *****************************************-->
      <table class="min-w-full table-auto">
        <thead class="justify-between">
          <tr class="bg-gray-800">
            <th class="px-16 py-2">
              <span class="text-gray-300">Materia</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-300">Evaluar</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-300">Nombre docente</span>
            </th>
            <th class="px-16 py-2">
              <span class="text-gray-300">Status</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200">
              @foreach($materias as $materia)
          <tr class="bg-white border-4 border-gray-200">

            <td>

              <span class="text-center ml-2 font-semibold">{{$materia->descripcion}}</span>

            </td>
            <td class="px-16 py-2">
                <a href="{{route('principal.edit',$materia->id)}}">
                    @if($materia->contestada == 0)
              <button  class="bg-blue-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                Evaluar
              </button>
                    @else
                        <button disabled class="px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                            Evaluar
                        </button>
                        @endif
                </a>
            </td>
            <td class="px-16 py-2">
              <span>{{$materia->docente}}</span>
            </td>


            <td class="px-16 py-2">

                    @if($materia->contestada == 0)
                    <div class="inline-block mr-2 mt-2">
                        <button type="button" disabled class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-red-400 to-red-600 transform hover:scale-110">Sin cotestar</button>
                    </div>
                    @else
                    <div class="inline-block mr-2 mt-2">
                        <button type="button" disabled class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Contestada</button>
                    </div>
                        @endif

            </td>
          </tr>
                 @endforeach

        </tbody>
      </table>
  <!-- **********************************   fin tabla ***************************************-->
            </div>
            <br>

                <form method="POST" action="{{ route('logout') }}">
                <div class="flex justify-between"  >

                        @csrf



                    <div></div>
                    <div><button onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('logout') }}"  type="button" class="focus:outline-none text-white text-sm py-3 px-20 rounded-md bg-gradient-to-r from-gray-600 to-gray-900 transform hover:scale-200">Salir</button></div>
                    <div></div>

                </div>
                </form>
  
        </div>

    </div>

</x-app-layout>
