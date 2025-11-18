@extends('layouts.layout')
@section('body')
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="{{ $home->photo }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $home->address }}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                        {{ "$home->type com $home->bed Quartos e $home->bath Banheiros." }}
                    </h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            @php
                                $avgRating = $home->averageRating() ?? 0;
                                $totalRatings = $home->totalRatings();
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                <svg fill="{{ $i <= round($avgRating) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                            @endfor
                            <span class="text-gray-600 ml-3">{{ number_format($avgRating, 1) }} ({{ $totalRatings }} {{ $totalRatings == 1 ? 'Avaliação' : 'Avaliações' }})</span>
                        </span>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>

                    <div class="flex mt-6 flex-col items-start pb-5 border-b-2 border-gray-100 mb-5">
                        <p class="leading-relaxed">{{ $home->description }}</p>
                        <p class="leading-relaxed">Detalhes da casa:</p>
                        <p class="leading-relaxed">Área total: {{ $home->area }}</p>
                        <p class="leading-relaxed">Quartos: {{ $home->bed }}</p>
                        <p class="leading-relaxed">Banheiros: {{ $home->bath }}</p>
                        <p class="leading-relaxed">Vagas: {{ $home->parking }}</p>

                    </div>
                    <div class="flex">
                        <span class="title-font font-medium text-2xl text-gray-900">{{ formatMoney($home->value) }}</span>
                        <button
                            class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">
                            Solicitar Contato
                        </button>
                        <button
                            class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4 hover:text-red-500 ease-in">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Seção de Avaliações -->
            <div class="lg:w-4/5 mx-auto mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Avaliações</h2>

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

                @auth
                    @php
                        $userRating = $home->ratings()->where('user_id', auth()->id())->first();
                        $isOwner = $home->user_id === auth()->id();
                    @endphp

                    @if(!$userRating && !$isOwner)
                        <!-- Formulário para adicionar avaliação -->
                        <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Deixe sua avaliação</h3>
                            <form action="{{ route('ratings.store', $home->id) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                        Nota (1-5 estrelas)
                                    </label>
                                    <div class="flex gap-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <label class="cursor-pointer">
                                                <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                                <svg class="w-8 h-8 text-gray-300 peer-checked:text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                                </svg>
                                            </label>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                        Comentário (opcional)
                                    </label>
                                    <textarea name="comment" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Conte-nos sobre sua experiência...">{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Enviar Avaliação
                                </button>
                            </form>
                        </div>
                    @elseif($isOwner)
                        <div class="mb-8 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded">
                            Você não pode avaliar sua própria casa.
                        </div>
                    @endif
                @else
                    <div class="mb-8 p-4 bg-gray-100 border border-gray-300 text-gray-700 rounded">
                        <a href="{{ route('login') }}" class="text-yellow-600 hover:text-yellow-700 font-semibold">Faça login</a> para deixar sua avaliação.
                    </div>
                @endauth

                <!-- Lista de Avaliações -->
                <div class="space-y-6">
                    @forelse($home->ratings()->latest()->get() as $rating)
                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-semibold text-gray-900">{{ $rating->user->name }}</h4>
                                    <div class="flex items-center mt-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $rating->rating ? 'text-yellow-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                            </svg>
                                        @endfor
                                        <span class="ml-2 text-sm text-gray-600">{{ $rating->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>

                                @auth
                                    @if($rating->user_id === auth()->id())
                                        <form action="{{ route('ratings.destroy', $rating->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta avaliação?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                                Excluir
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>

                            @if($rating->comment)
                                <p class="text-gray-700 mt-3">{{ $rating->comment }}</p>
                            @endif
                        </div>
                    @empty
                        <div class="p-6 bg-gray-50 rounded-lg text-center text-gray-600">
                            Nenhuma avaliação ainda. Seja o primeiro a avaliar esta casa!
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
