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
                    <form method="POST" action="{{ route('create_cliente') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-2">
                            <x-input-label for="nombre" :value="__('Nombre')" />

                            <x-text-input id="nombre" class="block mt-1 mb-3 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />

                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>


                        <!-- apellido -->
                        <div class="mb-2">
                            <x-input-label for="apellido" :value="__('Apellido')" />

                            <x-text-input id="apellido" class="block mt-1 mb-3 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus />

                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>

                        <!-- cedula -->
                        <div class="mb-2">
                            <x-input-label for="cedula" :value="__('Cedula')" />

                            <x-text-input id="cedula" class="block mt-1 mb-3 w-full" type="text" name="cedula" :value="old('cedula')" required autofocus />

                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>


                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />

                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>


                        <x-primary-button class="mt-9">
                            {{ __('Registrar Cliente') }}
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>