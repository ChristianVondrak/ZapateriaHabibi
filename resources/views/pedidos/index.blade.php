
@push('css')
    <link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">
@endpush

<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Pedidos') }}
      </h2>
      <div>
                <form action="{{route('pedidos.index')}}" method="get" autocomplete="off">
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" name='search' id="default-search" class="block pt-4 pb-4 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control" placeholder="Nro Orden, descripcion..." value="{{$search}}">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                    </div>
                </form>
            </div>
            <div>
      <a href="{{ route('create_pedido') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4 leading-tight">
        Crear pedido
      </a>
      </div>
 
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @include('flash-message')
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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Monto
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
                          
                            <div class="text-m text-gray-900">
                              {{ $pedido->description }}
                            </div>
                        
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $pedido->id }}</div>

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $pedido->cliente->cedula }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          @if ( $pedido->status ==='Reparado')
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            @elseif( $pedido->status ==='En proceso')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                              @elseif( $pedido->status ==='Retirado')
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                @endif
                                {{ $pedido->status }}
                              </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              <!-- {{ $pedido->created_at->formatLocalized('%A %d %B %Y') }} -->
                              <!-- {{Carbon\Carbon::now()->formatLocalized('%A %d %B %Y')}} -->
                              {{Carbon\Carbon::parse($pedido->created_at)->translatedFormat('d F Y')}}
                            </div>
                            <div class="text-sm text-gray-500">
                              {{ $pedido->created_at->diffForHumans() }}
                            </div>
                          </div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                             {{ '$ '. $pedido->monto}}
                            </div>
                          </div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="{{ route('edit_pedido',$pedido->id)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                          <a href="{{ route('delete_pedido',$pedido->id)}}" class="text-indigo-600 hover:text-indigo-900 mx-2">Eliminar</a> 
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

  <script>
    var alert_del = document.querySelectorAll('.alert-del');
  alert_del.forEach((x) =>
    x.addEventListener('click', function () {
      x.parentElement.classList.add('hidden');
    })
  );
  </script>
</x-app-layout>