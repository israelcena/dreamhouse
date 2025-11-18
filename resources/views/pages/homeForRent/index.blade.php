@extends('layouts.layout')
@section('body')
    <section class="text-gray-600 body-font">
        <div class="mx-auto container pt-16 flex gap-4 justify-center">
            <div class="w-3/12 bg-yellow-100/50 rounded-lg p-4 text-gray-500">
                <form class="space-y-6" method="GET" action="{{ route('homesForRent.index') }}">
                    <div>
                        <label class="capitalize" for="localization">Localização do imóvel</label>
                        <input type="text" id="localization" name="localization"
                            value="{{ $filters['localization'] ?? '' }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            placeholder="Digite a localização" />
                    </div>
                    <div class="flex flex-col">
                        <label for="type">Tipo de imóvel</label>
                        <select name="type" id="type"
                            class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">Todos</option>
                            <option value="Casa" {{ ($filters['type'] ?? '') == 'Casa' ? 'selected' : '' }}>Casa</option>
                            <option value="Apartamento" {{ ($filters['type'] ?? '') == 'Apartamento' ? 'selected' : '' }}>Apartamento</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <div class="w-1/2 flex flex-col">
                            <label for="min-value">Preço Mínimo</label>
                            <input type="number" name="min-value" id="min-value" placeholder="10000"
                                value="{{ $filters['min-value'] ?? '' }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                        </div>
                        <div class="w-1/2 flex flex-col">
                            <label for="max-value">Preço Máximo</label>
                            <input type="number" name="max-value" id="max-value" placeholder="10000000"
                                value="{{ $filters['max-value'] ?? '' }}"
                                class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                        </div>
                    </div>
                    <div>
                        <label for="beds">Número mínimo de quartos</label>
                        <input type="number" name="beds" id="beds" placeholder="0" min="0"
                            value="{{ $filters['beds'] ?? '' }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                    </div>
                    <div class="">
                        <label for="baths">Número mínimo de banheiros</label>
                        <input type="number" name="baths" id="baths" placeholder="0" min="0"
                            value="{{ $filters['baths'] ?? '' }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                    </div>
                    <div class="">
                        <label for="parking">Número mínimo de Vagas</label>
                        <input type="number" name="parking" id="parking" placeholder="0" min="0"
                            value="{{ $filters['parking'] ?? '' }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                            class="flex-1 inline-flex justify-center text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">
                            Buscar
                        </button>
                        <a href="{{ route('homesForRent.index') }}"
                            class="inline-flex justify-center items-center text-gray-700 bg-gray-200 border-0 py-2 px-4 focus:outline-none hover:bg-gray-300 rounded">
                            Limpar
                        </a>
                    </div>
                </form>
            </div>

            <div class="w-8/12">
                @if (session()->has('notfound'))
                    <div class="flex flex-col md:pr-10 md:mb-0 mb-6 pr-0 w-full md:w-auto md:text-left text-center">
                        <h2 class="text-xs text-yellow-500 tracking-widest font-medium title-font mb-1">
                            {{ session()->get('notfound') }}</h2>
                        <h1 class="md:text-3xl text-2xl font-medium title-font text-gray-900">Todos nossos produtos
                            disponíveis:</h1>
                    </div>
                @endif
                <div class="flex flex-col">
                    @forelse ($homes as $home)
                        <a href="{{ route('homesForRent.show', $home->id) }}">
                            <div class="flex gap-4 mb-4 cursor-pointer border-0 hover:bg-gray-50">
                                <div class="w-2/5 rounded-lg overflow-hidden">
                                    <img class="object-cover object-center w-full h-full" src="{{ $home->photo }}"
                                        alt="{{ $home->address }}">
                                </div>
                                <div class="w-3/5 flex flex-wrap -mx-4 mt-auto mb-auto">
                                    <div class="w-full sm:p-4 px-4 mb-6">
                                        <div class="leading-relaxed">{{ $home->address }}</div>
                                        <h1 class="title-font font-medium text-xl mb-2 text-gray-900">
                                            {{ "$home->type com $home->bed Quartos, com $home->area m²" }} </h1>
                                        <h2 class="mb-2">{{ formatMoney($home->value) }}</h2>
                                        @php
                                            $avgRating = $home->averageRating() ?? 0;
                                            $totalRatings = $home->totalRatings();
                                        @endphp
                                        @if($totalRatings > 0)
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= round($avgRating) ? 'text-yellow-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                                    </svg>
                                                @endfor
                                                <span class="ml-2 text-sm text-gray-600">{{ number_format($avgRating, 1) }} ({{ $totalRatings }})</span>
                                            </div>
                                        @else
                                            <div class="text-sm text-gray-500">Sem avaliações ainda</div>
                                        @endif
                                    </div>
                                    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $home->area }}
                                            m²</h2>
                                        <p class="leading-relaxed">Área total</p>
                                    </div>
                                    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $home->bed }}</h2>
                                        <p class="leading-relaxed">Quartos</p>
                                    </div>
                                    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $home->bath }}</h2>
                                        <p class="leading-relaxed">Banheiros</p>
                                    </div>
                                    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $home->parking }}</h2>
                                        <p class="leading-relaxed">Vagas</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="p-8 text-center">
                            <div class="mb-4">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhuma casa encontrada</h3>
                            <p class="text-gray-500 mb-4">Não encontramos casas com os filtros selecionados. Tente ajustar sua busca.</p>
                            <a href="{{ route('homesForRent.index') }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg">
                                Ver todas as casas
                            </a>
                        </div>
                    @endforelse
                </div>
                <div class="text-gray-200">
                    {{ $homes->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
