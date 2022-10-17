<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Pedidos') }}
      </h2>
      <a href="{{ route('create_pedido') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4 leading-tight">
        Crear pedido
</a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Orden
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Cedula
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Fecha
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($pedidos as $pedido)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              {{ $pedido->description }}
                            </div>
                            <!-- <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    Jane Cooper
                                </div>
                                <div class="text-sm text-gray-500">
                                    jane.cooper@example.com
                                </div>
                                </div> -->
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $pedido->id }}</div>

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $pedido->cliente->cedula }}

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          @if ( $pedido->status ==='Terminado')
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            @elseif( $pedido->status ==='Pendiente')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                              @elseif( $pedido->status ==='Recogido')
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                @endif
                                {{ $pedido->status }}
                              </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{ $pedido->created_at->formatLocalized('%A %d %B %Y') }}
                            </div>
                            <div class="text-sm text-gray-500">
                              {{ $pedido->created_at->diffForHumans() }}
                            </div>
                          </div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                      <!-- More items... -->
                    </tbody>
                  </table>
                </div>
                <div class="mt-4">
                  {{ $pedidos->links() }}
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
</x-app-layout>