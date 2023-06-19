<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participantes') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full">
          <thead class="bg-white border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Nome
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Sobrenome
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Primeira etapa
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Segunda Etapa
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($persons as $index => $person)
            @if ($index % 2 == 0)
              <tr class="bg-gray-100 border-b even">
            @else
              <tr class="bg-white border-b odd">
            @endif
                <td>{{ $person->first_name }}</td>
                <td> {{ $person->last_name }}</td>
                <td>Auditório: {{ $person->participation[0]->conferenceRoom->room_name  }}</br>
                Coffee break: {{ $person->participation[0]->coffeeLounge->coffee_lounge_name }}
                </td>
                <td>
                  <td>Auditório: {{ $person->participation[1]->conferenceRoom->room_name  }}</br>
                    Coffee break: {{ $person->participation[1]->coffeeLounge->coffee_lounge_name }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</x-app-layout>
