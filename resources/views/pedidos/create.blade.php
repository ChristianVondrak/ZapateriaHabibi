<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('create_pedido') }}">
                        @csrf

                        <!-- Description -->
                        <div class="mb-2">
                            <x-input-label for="desc" :value="__('Descripcion del pedido')" />

                            <x-text-input id="desc" class="block mt-1 mb-3 w-full" type="text" name="desc" :value="old('desc')" required autofocus />

                            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                        </div>
                         <!-- Price -->
                         <div class="mb-2">
                            <x-input-label for="monto" :value="__('Monto')" />

                            <x-text-input id="monto" class="block mt-1 mb-3 w-full" type="number" name="monto" :value="old('monto')" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" required autofocus />

                            <x-input-error :messages="$errors->get('monto')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="clients" :value="__('Cliente')" />
                            <select id="clients" name="clients" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control">
                                @if($clientes!=null)
                                @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{ $cliente->nombre . " CI: V-" . $cliente->cedula}}</option>
                                @endforeach
                                @endif

                                @if($cliente!=null)
                                <option value="{{$cliente->id}}">{{ $cliente->nombre . " CI: V-" . $cliente->cedula}}</option>
                                @endif
                            </select>
                        </div>


                        <x-primary-button class="mt-9">
                            {{ __('Registrar Pedido') }}
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>