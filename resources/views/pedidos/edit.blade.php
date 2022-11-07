<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('update_pedido',$pedido->id) }}">
                        @csrf

                        <!-- Description -->
                        <div class="mb-2">
                            <x-input-label for="desc" :value="__('Descripcion del pedido')" />

                            <x-text-input id="desc" class="block mt-1 mb-3 w-full" type="text" name="desc" :value="$pedido->description" required autofocus />

                            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                        </div>

                         <!-- Price -->
                         <div class="mb-2">
                            <x-input-label for="monto" :value="__('Monto')" />

                            <x-text-input id="monto" class="block mt-1 mb-3 w-full" type="number" name="monto" :value="$pedido->monto" step="0.01" required autofocus />

                            <x-input-error :messages="$errors->get('monto')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Estado')" />
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control">
                                @if($pedido->status=='En proceso')
                                <option value="En proceso">{{$pedido->status}}</option>
                                <option value="Reparado">Reparado</option>
                                <option value="Retirado">Retirado</option>
                                @elseif($pedido->status=='Reparado')
                                <option value="Reparado">{{$pedido->status}}</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Retirado">Retirado</option>
                                @elseif($pedido->status=='Retirado')
                                <option value="Retirado">{{$pedido->status}}</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Reparado">Reparado</option>
                                @else
                                <option value="Retirado">Retirado</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Reparado">Reparado</option>
                                @endif
                            </select>
                        </div>
                        

                        <x-primary-button class="mt-9">
                            {{ __('Actualizar Pedido') }}
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>