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