<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="container mx-auto mt-4">
            <h2 class="text-2xl font-bold">Agregar Producto</h2>
            <form method="POST" action="{{ route('vendedor.products.store') }}" class="mt-4">
                @csrf

                <div class="mb-4">
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" type="text" name="name" required />
                </div>

                <div class="mb-4">
                    <x-label for="description" value="{{ __('Descripción') }}" />
                    <textarea id="description" name="description" class="block mt-1 w-full" required></textarea>
                </div>

                <div class="mb-4">
                    <x-label for="price" value="{{ __('Precio') }}" />
                    <x-input id="price" type="number" name="price" step="0.01" required />
                </div>

                <x-button class="mt-4">
                    {{ __('Agregar Producto') }}
                </x-button>
            </form>

            <!-- Botón para volver al Dashboard -->
            <div class="mt-6">
                <a href="{{ route('vendedor.dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Volver
                </a>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
