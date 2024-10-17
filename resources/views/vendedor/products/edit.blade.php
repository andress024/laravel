<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div>
            <h2>Editar Producto</h2>
            <form method="POST" action="{{ route('vendedor.products.update', $product) }}">
                @csrf
                @method('PUT')

                <div>
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" type="text" name="name" value="{{ $product->name }}" required />
                </div>

                <div>
                    <x-label for="description" value="{{ __('Descripción') }}" />
                    <textarea id="description" name="description">{{ $product->description }}</textarea>
                </div>

                <div>
                    <x-label for="price" value="{{ __('Precio') }}" />
                    <x-input id="price" type="number" name="price" value="{{ intval($product->price) }}" required />
                </div>

                <x-button class="mt-4">
                    {{ __('Actualizar Producto') }}
                </x-button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
