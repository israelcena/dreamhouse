<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $InUser->name }}, Você está logado!</p>
                <br/>
                    <p>Suas Informações: </p>
                    <p>Cpf: {{ $InUser->cpf }}</p>
                    <p>Telefone: {{ $InUser->phone }}</p>
                    <p>Endereço: {{ $InUser->address }}</p>
                </div>
            </div>
        </div>
    </div>

    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            <div class="flex flex-col text-center w-full mb-8">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Casas Cadastradas</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($homesOfUser as $home)
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div class="flex relative">
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src={{ $home->photo }} >
                        <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                            <h2 class="tracking-widest text-sm title-font font-medium text-yellow-500 mb-1">{{ $home->type }} {{ $home->condition }}</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ formatMoney($home->value) }}</h1>
                            <p class="leading-relaxed">{{ $home->type }} {{ $home->condition }} com {{ $home->bed }} quartos, {{ $home->bath }} banheiros, {{ $home->parking }} vagas de garagem e com {{ $home->area }} m² de espaço.</p>
                            <div class="mt-4 flex gap-4">
                            <button
                            class="text-white bg-yellow-500 border-0 py-1 px-4 focus:outline-none hover:bg-yellow-500 rounded hover:bg-yellow-400 focus:outline-none">
                            Editar
                            </button>
                            <form action="">
                            <button
                            class="text-white bg-red-500 border-0 py-1 px-4 focus:outline-none hover:bg-red-500 rounded hover:bg-red-400 focus:outline-none">
                            Excluir
                            </button>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>
