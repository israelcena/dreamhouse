<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="flex flex-col justify-center items-center">
        {{ $logo }}
        <span class="mt-2 text-xl">DreamHouse</span>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
        <a href="{{  route('index') }}" class="text-yellow-500 inline-flex items-center md:mb-2 lg:mb-0 mt-4">Voltar para Home<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg></a>
    </div>
</div>
