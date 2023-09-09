@extends('layouts.layout')
@section('body')
    <section class="relative text-gray-600 body-font mb-12 bg-gradient-to-br from-yellow-300 overflow-clip">
        <div class="mx-full flex flex-col px-1 justify-center items-center min-h-[70vh]">
            <img class="absolute -z-10 h-fit object-cover" src="{{ url('/') }}/images/main-page/main-photo.jpg"
                alt="main photo">
            <div
                class="w-full md:w-2/3 flex flex-col justify-center items-center text-center bg-white p-6 rounded-lg min-h-[35vh]">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Vamos Encontrar Sua Casa dos
                    Sonhos</h1>
                <p class="mb-4 leading-relaxed">As melhores casas, os melhores corretores, os melhores designers e arquitetos
                    com a melhor plataforma.</p>
                <form class="w-full" action="{{ route('homesForRent.search') }}" method="GET">
                    <div class="flex w-full justify-center items-end">
                        <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4 md:w-full text-left">
                            <label for="search" class="leading-7 text-sm text-gray-600">Estilo ou local:</label>
                            <input type="search" id="search" name="search"
                                class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                control-id="ControlID-82"
                                placeholder="Ex: Conceito Aberto, Interior Cinza, Apartamento, Rio de Janeiro, Virtual..." />
                        </div>
                        <button
                            class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">
                            Buscar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font bg-white">
        <div class="container mx-auto flex px-5 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Conectamos Pessoas!
                    <br class="hidden lg:inline-block">Arquitetos, Compradores e Vendedores.
                </h1>
                <p class="mb-8 leading-relaxed">DreamHouse está construindo um mercado colaborativo para conectar pessoas,
                    vendedores, arquitetos, designers, agentes e equipá-los com as ferramentas certas em cada etapa do
                    processo.
                    Aqui vamos ajudá-lo a tomar a decisão da melhor casa, com avaliações, comentários e muitas informações,
                    tornando assim você a pessoa mais informada, seja comprando sua casa dos sonhos ou vendendo um imóvel.
                    Estamos redefinindo o processo de compra de casas.</p>
                <div class="flex justify-center">
                    <button
                        class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">
                        <a href="{{ route('homesForRent.index') }}">Explorar</a></button>
                    <button
                        class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                        <a href="/register">
                            Cadastre-se
                        </a>
                    </button>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero"
                    src="{{ url('/') }}/images/main-page/hero-s.jpg">
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">As Casas Mais Amadas</h1>
                    <div class="h-1 w-20 bg-yellow-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Aqui está a seleção das casas mais bem avaliadas!
                </p>
            </div>
            <div class="flex flex-wrap -m-4">
                @if ($homes)
                    @foreach ($homes as $home)
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <a href="{{ route('homesForRent.show', $home->id) }}">
                                <div class="bg-gray-100 p-6 rounded-lg h-100 hover:bg-gray-200 ease-in duration-200">
                                    <img class="h-40 rounded w-full object-cover object-center mb-6"
                                        src="{{ $home->photo }}" alt="content">
                                    <h3 class="tracking-widest text-yellow-500 text-xs font-medium title-font">
                                        {{ $home->condition }}</h3>
                                    <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                                        {{ formatMoney($home->value) }}</h2>
                                    <p class="leading-relaxed text-base">
                                        {{ "$home->type com $home->bed Quartos, $home->bath Banheiros e com $home->area m² de area total." }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="flex justify-center w-full mt-4">
                        <button
                            class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded-lg text-lg">
                            <a href="{{ route('homesForRent.index') }}">Explorar Todas</a>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
