<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salas de conferência') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          <thead class="bg-white border-b">
            <tr>
              <thead class="bg-gray-500 text-center text-lg font-bold text-white">
                Cadastre nova sala
              </thead>
            </tr>
          </thead>
          <form method="post" action="{{ route('conference.room.store') }}">
          <tr>
            @csrf
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
             <label class="bg-gray pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-900
             absolute">Nome</label>
             <input placeholder="Nome da sala" type="text" name="room_name"
                  class="border placeholder-gray-400 focus:outline-none
                  focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                  border-gray-300 rounded-md"/ required>
                @error('room_name')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </td>
            <td>
              <label class="bg-gray pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-900
              absolute">Lotação máxima</label>
              <input placeholder="Lotação máxima" type="number" name="capacity"
                  class="border placeholder-gray-400 focus:outline-none
                   focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white
                   border-gray-300 rounded-md"/ required>
                @error('capacity')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </td>
            <td>
             <button type="submit" 
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-4 sm:px-2.5 sm:py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
              Cadastrar</button>
            </td>
            </td>
          </tr>
          </form>
        </table>
        <table class="min-w-full">
          <thead class="bg-white border-b">
            <tr>
          @if(!isset($conferenceRooms[0]->id))

            <th colspan="3" scope="col" class="text-center text-lg font-bold text-white bg-red-800 px-6 py-4">
              Não há salas de conferência cadastradas
            </th>
          @endif
          @if(isset($conferenceRooms[0]->id))
            <th colspan="4" scope="col" class="text-center text-lg font-bold text-white bg-gray-800 px-6 py-4">
              Salas de conferência
            </th>
          @endif
            </tr>
            <tr>            
              <th scope="col" class="text-bold font-medium text-gray-900 px-6 py-4 text-left">
                ID
              </th>
              <th scope="col" class="text-bold font-medium text-gray-900 px-6 py-4 text-left">
                Sala
              </th>
              <th scope="col" class="text-bold font-medium text-gray-900 px-6 py-4 text-left">
                Capacidade
              </th>
              <th> </th>
            </tr>
          </thead>
          
          <tbody>
            @foreach ($conferenceRooms as $index => $room)
              @if ($index % 2 == 0)
                <tr class="bg-gray-100 border-b even">
              @else
                <tr class="bg-white border-b odd">
              @endif
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $room->id }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ $room->room_name }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{ $room->capacity }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <a href="{{ route('conference.room.show', $room->id) }}" class="text-blue-500 hover:text-blue-700">
                    <i class="fas fa-eye"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
          


        </table>
      </div>
    </div>
  </div>
</div>
<script>
  function toggleParticipants(roomId) {
    const participantsDiv = document.getElementById(`participants-${roomId}`);
    if (participantsDiv.style.display === 'none') {
      participantsDiv.style.display = 'block';
    } else {
      participantsDiv.style.display = 'none';
    }
  }
</script>

</x-app-layout>
