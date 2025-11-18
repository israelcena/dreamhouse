<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitações de Contato Recebidas') }}
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
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Solicitações Recebidas ({{ $contactRequests->total() }})</h3>
                        <a href="{{ route('contact-requests.my-requests') }}"
                           class="text-yellow-600 hover:text-yellow-700 font-semibold">
                            Ver Minhas Solicitações Enviadas →
                        </a>
                    </div>

                    @forelse($contactRequests as $request)
                        <div class="mb-6 p-4 border rounded-lg {{ $request->status === 'pending' ? 'border-yellow-300 bg-yellow-50' : 'border-gray-200' }}">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900">{{ $request->name }}</h4>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold">Casa:</span>
                                        <a href="{{ route('homesForRent.show', $request->homeForRent->id) }}"
                                           class="text-yellow-600 hover:text-yellow-700">
                                            {{ $request->homeForRent->type }} - {{ $request->homeForRent->address }}
                                        </a>
                                    </p>
                                </div>

                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $request->status === 'pending' ? 'bg-yellow-200 text-yellow-800' : '' }}
                                    {{ $request->status === 'contacted' ? 'bg-blue-200 text-blue-800' : '' }}
                                    {{ $request->status === 'closed' ? 'bg-gray-200 text-gray-800' : '' }}">
                                    {{ $request->status === 'pending' ? 'Pendente' : '' }}
                                    {{ $request->status === 'contacted' ? 'Contatado' : '' }}
                                    {{ $request->status === 'closed' ? 'Fechado' : '' }}
                                </span>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-3">
                                <div>
                                    <p class="text-sm text-gray-600"><span class="font-semibold">Email:</span> {{ $request->email }}</p>
                                    <p class="text-sm text-gray-600"><span class="font-semibold">Telefone:</span> {{ $request->phone }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold">Data:</span> {{ $request->created_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <p class="text-sm font-semibold text-gray-700">Mensagem:</p>
                                <p class="text-sm text-gray-600 mt-1 p-3 bg-gray-50 rounded">{{ $request->message }}</p>
                            </div>

                            <div class="flex gap-2">
                                @if($request->status === 'pending')
                                    <form action="{{ route('contact-requests.update-status', $request->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="contacted">
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                            Marcar como Contatado
                                        </button>
                                    </form>
                                @endif

                                @if($request->status !== 'closed')
                                    <form action="{{ route('contact-requests.update-status', $request->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="closed">
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                            Fechar Solicitação
                                        </button>
                                    </form>
                                @endif

                                <a href="mailto:{{ $request->email }}?subject=Re: Casa {{ $request->homeForRent->type }}"
                                   class="inline-flex items-center px-3 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600">
                                    Responder por Email
                                </a>

                                <a href="tel:{{ $request->phone }}"
                                   class="inline-flex items-center px-3 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                                    Ligar
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhuma solicitação</h3>
                            <p class="mt-1 text-sm text-gray-500">Você ainda não recebeu solicitações de contato para suas casas.</p>
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
