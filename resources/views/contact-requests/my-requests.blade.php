<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas Solicitações Enviadas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Solicitações Enviadas ({{ $contactRequests->total() }})</h3>
                        <a href="{{ route('contact-requests.index') }}"
                           class="text-yellow-600 hover:text-yellow-700 font-semibold">
                            ← Ver Solicitações Recebidas
                        </a>
                    </div>

                    @forelse($contactRequests as $request)
                        <div class="mb-6 p-4 border rounded-lg {{ $request->status === 'pending' ? 'border-yellow-300 bg-yellow-50' : 'border-gray-200' }}">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <a href="{{ route('homesForRent.show', $request->homeForRent->id) }}"
                                       class="text-lg font-semibold text-gray-900 hover:text-yellow-600">
                                        {{ $request->homeForRent->type }} - {{ $request->homeForRent->address }}
                                    </a>
                                    <p class="text-sm text-gray-600 mt-1">
                                        {{ $request->homeForRent->bed }} quartos |
                                        {{ $request->homeForRent->bath }} banheiros |
                                        {{ formatMoney($request->homeForRent->value) }}
                                    </p>
                                </div>

                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $request->status === 'pending' ? 'bg-yellow-200 text-yellow-800' : '' }}
                                    {{ $request->status === 'contacted' ? 'bg-blue-200 text-blue-800' : '' }}
                                    {{ $request->status === 'closed' ? 'bg-gray-200 text-gray-800' : '' }}">
                                    {{ $request->status === 'pending' ? 'Aguardando Resposta' : '' }}
                                    {{ $request->status === 'contacted' ? 'Proprietário Contatou' : '' }}
                                    {{ $request->status === 'closed' ? 'Fechado' : '' }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Enviado em:</span> {{ $request->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>

                            <div class="mb-3">
                                <p class="text-sm font-semibold text-gray-700">Sua Mensagem:</p>
                                <p class="text-sm text-gray-600 mt-1 p-3 bg-gray-50 rounded">{{ $request->message }}</p>
                            </div>

                            <div class="text-sm text-gray-600">
                                <p><span class="font-semibold">Seus dados de contato:</span></p>
                                <p>Nome: {{ $request->name }}</p>
                                <p>Email: {{ $request->email }}</p>
                                <p>Telefone: {{ $request->phone }}</p>
                            </div>

                            @if($request->status === 'pending')
                                <div class="mt-3 p-3 bg-yellow-100 border border-yellow-300 rounded">
                                    <p class="text-sm text-yellow-800">
                                        ⏳ Aguardando resposta do proprietário. Você será contatado em breve!
                                    </p>
                                </div>
                            @elseif($request->status === 'contacted')
                                <div class="mt-3 p-3 bg-blue-100 border border-blue-300 rounded">
                                    <p class="text-sm text-blue-800">
                                        ✅ O proprietário marcou como contatado. Verifique seu email/telefone!
                                    </p>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhuma solicitação enviada</h3>
                            <p class="mt-1 text-sm text-gray-500">Você ainda não enviou solicitações de contato para casas.</p>
                            <div class="mt-6">
                                <a href="{{ route('homesForRent.index') }}"
                                   class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600">
                                    Explorar Casas
                                </a>
                            </div>
                        </div>
                    @endforelse

                    @if($contactRequests->hasPages())
                        <div class="mt-6">
                            {{ $contactRequests->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
