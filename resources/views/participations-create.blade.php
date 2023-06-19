<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          <thead class="bg-white border-b">
            <tr>
                <th scope="col" colspan="2" class="text-sm font-medium text-gray-900 px-6 py-4 text-center font-bold">
                    Cadastre participante
                </th>
            </tr>
          </thead>
          <form method="POST" action=" {{ route('participations.store')}} ">
            @csrf
          <tbody>
            <tr class="bg-gray-100 border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                <label class="bg-gray pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-900
                absolute">Nome</label>
                <input placeholder="Nome" type="text" name="first_name"
                  class="border placeholder-gray-400 focus:outline-none
                  focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                  border-gray-300 rounded-md"/ required>
                @error('first_name')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <label class="bg-gray pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-900
                absolute">Sobrenome</label>
                <input placeholder="Sobrenome" type="text" name="last_name"
                  class="border placeholder-gray-400 focus:outline-none
                  focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                  border-gray-300 rounded-md"/ required>
                @error('last_name')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
              </td>
            </tr>
            <tr class="bg-white border-b">
                <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Primeira etapa
                </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" style="vertical-align: top;">
                <label class="inline-flex items-center">Salas disponíveis</label><br>
                @foreach($conferenceRooms as $conferenceRoom)
                <input type="radio" 
                    id="stage1-conference-room-{{ $conferenceRoom->id }}" 
                    name="stage[1][conference_room_id]" 
                    value="{{ $conferenceRoom->id }}"> {{ $conferenceRoom->room_name }} - 
                    @if( $conferenceRoom['availableSeats'][1] > 0)
                    Vagas disponíveis {{ $conferenceRoom['availableSeats'][1] }} </br>
                    <pre>Sujeito a confirmação</pre>
                    @else
                    <span class="text-red-500">Não há vagas</span>
                    @endif
                @endforeach
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" style="vertical-align: top;">
                <label class="inline-flex items-center">Espaços disponíveis para o coffee break</label></br>
                @foreach($coffeeLounges as $coffeeLounge)
                <input type="radio" 
                    id="stage1-coffee_lounge-{{ $coffeeLounge->id }}" 
                    name="stage[1][coffee_lounge_id]" 
                    value="{{ $coffeeLounge->id }}"> {{ $coffeeLounge->coffee_lounge_name }}
                    @if( $coffeeLounge['availableSeats'][1] > 0)
                    Vagas disponíveis {{ $coffeeLounge['availableSeats'][1] }} </br>
                    <pre>Sujeito a confirmação</pre>
                    @else
                    <span class="text-red-500">Não há vagas</span>
                    @endif
                @endforeach
                <input type="hidden"  name="stage[1][stage]" value="1">    
              </td>
            </tr>
            <tr class="bg-white border-b">
                <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Segunda etapa
                </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" style="vertical-align: top;">
                <label class="inline-flex items-center">Salas disponíveis</label><br>
                @foreach($conferenceRooms as $conferenceRoom)
                <input type="radio" 
                    id="stage1-conference-room-{{ $conferenceRoom->id }}" 
                    name="stage[2][conference_room_id]" 
                    value="{{ $conferenceRoom->id }}"> {{ $conferenceRoom->room_name }} - 
                    @if( $conferenceRoom['availableSeats'][2] > 0)
                    Vagas disponíveis {{ $conferenceRoom['availableSeats'][2] }} </br>
                    <pre>Sujeito a confirmação</pre>
                    @else
                    <span class="text-red-500">Não há vagas</span>
                    @endif
                @endforeach
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" style="vertical-align: top;">
                <label class="inline-flex items-center">Espaços disponíveis para o coffee break</label></br>
                @foreach($coffeeLounges as $coffeeLounge)
                <input type="radio" 
                    id="stage1-coffee_lounge-{{ $coffeeLounge->id }}" 
                    name="stage[2][coffee_lounge_id]" 
                    value="{{ $coffeeLounge->id }}"> {{ $coffeeLounge->coffee_lounge_name }} - 
                    @if( $coffeeLounge['availableSeats'][2] > 0)
                    Vagas disponíveis {{ $coffeeLounge['availableSeats'][2] }} </br>
                    <pre>Sujeito a confirmação</pre>
                    @else
                    <span class="text-red-500">Não há vagas</span>
                    @endif
                @endforeach  
                <input type="hidden"  name="stage[2][stage]" value="2">
              </td>
            </tr>
            <tr>
                <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" style="vertical-align: top;">
                    <button type="submit" 
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-4 sm:px-2.5 sm:py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
              Cadastrar</button>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@if(session('success_message'))
  <div id="success-modal" class="fixed inset-0 flex items-center justify-center z-10">
    <div class="bg-green-200 bg-opacity-70 rounded-lg p-6 max-w-md mx-auto">
      <h2 class="text-lg font-semibold mb-4">Cadastro realizado com sucesso!</h2>
      <p>Nome: {{ session('person')['first_name'] }} {{ session('person')['last_name'] }}</p>
      <p>Ambientes:</p>
      <ul>
        @foreach(session('person')->conferenceRooms as $participation)
          <li>
            Sala de Conferência: {{ $participation->conferenceRoom->room_name }}
          </li>
        @endforeach

        @foreach(session('person')->coffeeLounges as $participation)
          <li>
            Área de Descanso: {{ $participation->coffeeLounge->coffee_lounge_name }}
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
      var successMessage = "{{ session('success_message') }}";
      if (successMessage) {
        var modal = document.getElementById("success-modal");
        modal.style.display = "block";
        
        setTimeout(function() {
            modal.style.display = "none";
        }, 10000);
      }
    });
  </script>
  

</x-app-layout>