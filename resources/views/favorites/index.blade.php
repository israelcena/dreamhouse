<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Favoritos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Casas Favoritadas ({{ $favorites->total() }})</h3>

                    @forelse($favorites as $favorite)
                        <div class="mb-6 p-4 border rounded-lg hover:bg-gray-50 transition">
                            <div class="flex gap-4">
                                <div class="w-48 h-32 flex-shrink-0">
                                    <img src="{{ $favorite->homeForRent->photo }}"
                                         alt="{{ $favorite->homeForRent->address }}"
                                         class="w-full h-full object-cover rounded">
                                </div>

                                <div class="flex-1">
                                    <a href="{{ route('homesForRent.show', $favorite->homeForRent->id) }}"
                                       class="text-xl font-semibold text-gray-900 hover:text-yellow-600">
                                        {{ $favorite->homeForRent->type }} - {{ $favorite->homeForRent->address }}
                                    </a>

                                    <p class="text-gray-600 mt-2">
                                        {{ $favorite->homeForRent->bed }} quartos |
                                        {{ $favorite->homeForRent->bath }} banheiros |
                                        {{ $favorite->homeForRent->area }} m²
                                    </p>

                                    <p class="text-2xl font-bold text-gray-900 mt-2">
                                        {{ formatMoney($favorite->homeForRent->value) }}
                                    </p>

                                    @php
                                        $avgRating = $favorite->homeForRent->averageRating() ?? 0;
                                        $totalRatings = $favorite->homeForRent->totalRatings();
                                    @endphp
                                    @if($totalRatings > 0)
                                        <div class="flex items-center mt-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= round($avgRating) ? 'text-yellow-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                                </svg>
                                            @endfor
                                            <span class="ml-2 text-sm text-gray-600">{{ number_format($avgRating, 1) }} ({{ $totalRatings }})</span>
                                        </div>
                                    @endif

                                    <p class="text-sm text-gray-500 mt-2">
                                        Favoritado em {{ $favorite->created_at->format('d/m/Y') }}
                                    </p>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <a href="{{ route('homesForRent.show', $favorite->homeForRent->id) }}"
                                       class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:border-yellow-700 focus:ring focus:ring-yellow-300 disabled:opacity-25 transition">
                                        Ver Casa
                                    </a>

                                    <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST"
                                          onsubmit="return confirm('Deseja remover dos favoritos?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                                            Remover
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum favorito</h3>
                            <p class="mt-1 text-sm text-gray-500">Comece favoritando casas que você gostou!</p>
                            <div class="mt-6">
                                <a href="{{ route('homesForRent.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600">
                                    Explorar Casas
                                </a>
                            </div>
                        </div>
                    @endforelse

                    @if($favorites->hasPages())
                        <div class="mt-6">
                            {{ $favorites->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
