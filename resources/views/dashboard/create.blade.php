<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Nova Casa') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger fade show" role="alert">
                Erro: <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="grid grid-cols-1 gap-2">
                            <div class="form-group mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto do Imóvel</label>
                                <p class="text-xs text-gray-500 mb-2">Escolha uma das opções abaixo:</p>

                                <div class="mb-3">
                                    <label for="photo" class="block text-sm text-gray-600 mb-1">Fazer upload de arquivo:</label>
                                    <input type="file"
                                        class="form-control
                                        w-full
                                        block
                                        py-1.5
                                        px-3
                                        font-normal
                                        text-base
                                        bg-white bg-clip-padding
                                        text-gray-700
                                        rounded
                                        border border-solid border-gray-300
                                        ease-in-out
                                        transition
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                        id="photo" name="photo" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
                                    <p class="text-xs text-gray-500 mt-1">Formatos aceitos: JPEG, PNG, JPG, GIF, WEBP (máx. 5MB)</p>
                                </div>

                                <div class="flex items-center my-3">
                                    <div class="flex-1 border-t border-gray-300"></div>
                                    <span class="px-3 text-gray-500 text-sm">OU</span>
                                    <div class="flex-1 border-t border-gray-300"></div>
                                </div>

                                <div>
                                    <label for="photo_url" class="block text-sm text-gray-600 mb-1">Informar URL da imagem:</label>
                                    <input type="text"
                                        class="form-control
                                        w-full
                                        block
                                        py-1.5
                                        px-3
                                        font-normal
                                        text-base
                                        bg-white bg-clip-padding
                                        text-gray-700
                                        rounded
                                        border border-solid border-gray-300
                                        ease-in-out
                                        transition
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                        id="photo_url" name="photo_url" placeholder="https://exemplo.com/imagem.jpg"
                                        value="{{ old('photo_url') }}" />
                                </div>
                            </div>
                            <div class="form-group mb-6">
                                <input type="text"
                                    class="form-control
                                    w-3/4
                                    py-1.5
                                    px-3
                                    font-normal
                                    text-base
                                    bg-white bg-clip-padding
                                    text-gray-700
                                    rounded
                                    border border-solid border-gray-300
                                    ease-in-out
                                    transition
                                    focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                    id="address" aria-describedby="address" name="address"
                                    placeholder="Endereço Completo" value="{{ old('address') }}" />
                                <input type="text"
                                    class="form-control
                                    w-1/5
                                    py-1.5
                                    px-3
                                    font-normal
                                    text-base
                                    bg-white bg-clip-padding
                                    text-gray-700
                                    rounded
                                    border border-solid border-gray-300
                                    ease-in-out
                                    transition
                                    focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                    id="cep" aria-describedby="cep" name="cep" placeholder="cep"
                                    value="{{ old('cep') }}" />
                            </div>
                            <div class="form-group mb-6 flex gap-2 justify-start items-center">
                                <label class="form-control" for="condition">Condição do imóvel: </label>
                                <select
                                    class="form-control text-gray-700
                                        bg-white bg-clip-padding
                                          border border-solid border-gray-300
                                        rounded"
                                    name="condition" id="condition" value="{{ old('condition') }}">
                                    >
                                    <option value="Novo">Novo</option>
                                    <option value="Pronto para morar">Pronto para morar</option>
                                    <option value="Na Planta">Na Planta</option>
                                </select>

                                <label class="form-control" for="type">Tipo do imóvel: </label>
                                <select
                                    class="form-control text-gray-700
                                        bg-white bg-clip-padding
                                            border border-solid border-gray-300
                                        rounded"
                                    name="type" id="type">
                                    <option value="Casa">Casa</option>
                                    <option value="Terreno">Terreno</option>
                                    <option value="Apartamento">Apartamento</option>
                                </select>
                                <div class="form-group flex items-center gap-2">
                                    <label for="value">Valor: </label>
                                    <input type="number"
                                        class="form-control block
                                                w-full
                                                py-1.5
                                                px-3
                                                font-normal
                                                text-base
                                                bg-white bg-clip-padding
                                                text-gray-700
                                                rounded
                                                border border-solid border-gray-300
                                                ease-in-out
                                                transition
                                                focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none m-0"
                                        id="value" placeholder="Valor do imóvel" name="value"
                                        value="{{ old('value') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group flex mb-4">
                            <div class="flex">
                                <label for="area">Área do imóvel: </label>
                                <input type="number"
                                    class="form-control block
                                                w-full
                                                py-1.5
                                                px-3
                                                font-normal
                                                text-base
                                                bg-white bg-clip-padding
                                                text-gray-700
                                                rounded
                                                border border-solid border-gray-300
                                                ease-in-out
                                                transition
                                                focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                    m-0 id="area" placeholder="em metros quadrados" name="area"
                                    value="{{ old('area') }}" />
                            </div>

                        </div>

                        <div class="form-group mb-6 flex gap-2 items-center">
                            <label class="form-control" for="bed">Quartos: </label>
                            <input type="number"
                                class="form-control block
                                                w-full
                                                py-1.5
                                                px-3
                                                font-normal
                                                text-base
                                                bg-white bg-clip-padding
                                                text-gray-700
                                                rounded
                                                border border-solid border-gray-300
                                                ease-in-out
                                                transition
                                                focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                m-0 id="bed" placeholder="em metros quadrados" name="bed"
                                value="{{ old('bed') }}" />

                            <label class="form-control" for="bed">Banheiros: </label>
                            <input type="number"
                                class="form-control block
                                                w-full
                                                py-1.5
                                                px-3
                                                font-normal
                                                text-base
                                                bg-white bg-clip-padding
                                                text-gray-700
                                                rounded
                                                border border-solid border-gray-300
                                                ease-in-out
                                                transition
                                                focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                m-0 id="bath" placeholder="em metros quadrados" name="bath"
                                value="{{ old('bath') }}" />

                            <label class="form-control" for="bed">Vagas de Estácionamento: </label>
                            <input type="number"
                                class="form-control block
                                                w-full
                                                py-1.5
                                                px-3
                                                font-normal
                                                text-base
                                                bg-white bg-clip-padding
                                                text-gray-700
                                                rounded
                                                border border-solid border-gray-300
                                                ease-in-out
                                                transition
                                                focus:text-gray-700 focus:bg-white focus:border-yellow-600 focus:outline-none"
                                m-0 id="parking" placeholder="em metros quadrados" name="parking"
                                value="{{ old('parking') }}" />
                        </div>

                        <div class="form-group form-check text-center mb-6">
                            <input type="checkbox"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-yellow-600 checked:border-yellow-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                                id="check" required>
                            <label class="form-check-label inline-block text-gray-800" for="check">Afirmo que
                                todos os
                                dados acima estão corretos</label>
                        </div>
                        <button type="submit"
                            class="
                            px-6
                            w-full
                            bg-yellow-600
                            py-2.5
                            font-medium
                            text-white
                            leading-tight
                            text-xs
                            rounded
                            uppercase
                            hover:bg-yellow-700 hover:shadow-lg
                            shadow-md
                            active:bg-yellow-800 active:shadow-lg
                            focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0
                            duration-150
                            transition
                            ease-in-out">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
