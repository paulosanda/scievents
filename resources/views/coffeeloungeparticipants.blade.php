<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-white leading-tight bg-gray-800 px-4 py-2">
          {{ __('Espaços de coffee break') }}
      </h2>
  </x-slot>

  <div class="flex flex-col">
      <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                  <table class="min-w-full">
                      <thead class="bg-white border-b">
                          <tr>
                              <th scope="col" colspan="2"
                                  class="text-m font-semibold text-gray-100 bg-gray-900 px-6 py-4 text-left">
                                  {{ $coffeeLounge->coffee_lounge_name }}
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($participants as $stage => $stageParticipants)
                              <tr class="bg-white border-b">
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                      Etapa {{ $stage }}
                                  </td>
                                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                      @foreach ($stageParticipants as $participation)
                                          {{ $participation->person->first_name }}
                                          {{ $participation->person->last_name }}
                                          <br>
                                      @endforeach
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
