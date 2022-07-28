@extends('layouts.layout')
@section('body')
    <section class="text-gray-600 body-font">
        <div class="mx-auto container pt-16 flex gap-4 justify-center">
            <div class="w-3/12 bg-yellow-100/50 rounded-lg p-4 text-gray-500">
                <form class="space-y-6" method="GET" action="">
                    @csrf
                    <div>
                        <label class="capitalize" for="localization">Localização do imóvel</label>
                        <input type="text" id="localization" name="localization"
                               value="{{ $search ? $search : old('search')}}"
                               class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                    </div>
                    <div class="flex flex-col">
                        <label for="type">Tipo de imóvel</label>
                        <select name="type" id="type"
                                class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <div class="w-1/2 flex flex-col">
                            <label for="min-value">Preço Mínimo</label>
                            <input type="text" name="min-value" id="min-value" placeholder="ex: 10000"
                                   class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                        </div>
                        <div class="w-1/2 flex flex-col">
                            <label for="max-value">Preço Máximo</label>
                            <input type="text" name="max-value" id="max-value" placeholder="ex: 10000000"
                                   class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                        </div>
                    </div>
                    <div>
                        <label for="beds">Número de quartos</label>
                        <input type="number" name="beds" id="beds" placeholder="0"
                               class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                    </div>
                    <div class="">
                        <label for="baths">Número de banheiros</label>
                        <input type="number" name="baths" id="baths" placeholder="0"
                               class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                    </div>
                    <div class="">
                        <label for="parking">Número de Vagas</label>
                        <input type="number" name="parking" id="parking" placeholder="0"
                               class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-yellow-200 focus:bg-transparent border border-gray-300 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"/>
                    </div>

                    <button
                        class="mt-6 inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-400 rounded">
                        Buscar
                    </button>
                </form>
            </div>

            <div class="w-8/12">
                <div class="flex flex-col">
                    @foreach($homes as $home)
                        <a href="{{ route('homesForRent.show', $home->id) }}">
                            <div class="flex gap-4 mb-4 cursor-pointer border-0 hover:bg-gray-50 ">
                                <div class="w-2/5 rounded-lg overflow-hidden">
                                    <img class="object-cover object-center w-full h-full" src="{{ $home->photo }}"
                                         alt="{{ $home->address }}">
                                </div>
                                <div class="w-3/5 flex flex-wrap -mx-4 mt-auto mb-auto">
                                    <div class="w-full sm:p-4 px-4 mb-6">
                                        <div class="leading-relaxed">{{ $home->address }}</div>
                                        <h1 class="title-font font-medium text-xl mb-2 text-gray-900">{{ "$home->type com $home->bed Quartos, com $home->area m²" }} </h1>
                                        <h2>R$ {{ $home->value }}</h2>
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
