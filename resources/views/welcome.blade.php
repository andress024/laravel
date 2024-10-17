<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-purple-500 to-blue-300">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-white">Bienvenido</h1>
            <p class="mt-4 text-lg text-white">Explora nuestros productos y ofertas especiales.</p>
            <div class="mt-8 flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-6 py-3 bg-white text-blue-600 font-semibold transition duration-300 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50"
                        >
                            Iniciar
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-6 py-3 bg-white text-blue-600 font-semibold transition duration-300 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50"
                        >
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-6 py-3 bg-white text-blue-600 font-semibold transition duration-300 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50"
                            >
                                Registro
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
