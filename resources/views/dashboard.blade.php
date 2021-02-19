<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Univer') }}
        </h2>
    </x-slot>

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
              <button class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                Evaluar
              </button>
                </a>
            </td>
            <td class="px-16 py-2">
              <span>{{$materia->docente}}</span>
            </td>


            <td class="px-16 py-2">
              <span class="text-green-500">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h5 "
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#2c3e50"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                    @if($materia->contestada == 0)
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <polyline points="12 7 12 12 15 15"></polyline>
                    @else
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <path d="M5 12l5 5l10 -10" />
                        @endif
                </svg>
              </span>
            </td>
          </tr>
                 @endforeach

        </tbody>
      </table>
    </div>
  <!-- **********************************   fin tabla ***************************************-->

            </div>
        </div>
    </div>
</x-app-layout>
