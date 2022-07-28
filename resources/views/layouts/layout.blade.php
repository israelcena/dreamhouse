<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'DreamHouse')</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@section('navbar')
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <a href="{{ route('homesForRent.index') }}" class="mr-5 hover:text-gray-900">Casas</a>
                <a href="{{ route('pages.aboutus') }}" class="mr-5 hover:text-gray-900">Quem Somos</a>
                <a href="{{ route('pages.contact') }}" class="hover:text-gray-900">Contato</a>
            </nav>
            <a href="{{ route('index') }}"
               class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2"
                     class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">DreamHouse</span>
            </a>
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                <button
                    class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 mr-2 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                    <a href="/login">
                        Login
                    </a>
{{--                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">--}}
{{--                        <path d="M5 12h14M12 5l7 7-7 7"></path>--}}
{{--                    </svg>--}}
                </button>
                <button
                    class="inline-flex items-center bg-yellow-500 text-white border-0 py-1 px-3 focus:outline-none hover:bg-yellow-600 rounded text-base mt-4 md:mt-0">
                    <a href="/register">
                        Cadastre-se
                    </a>
                </button>
            </div>
        </div>
    </header>
@show

@yield('body')

@section('footer')
    <footer class="text-gray-600 body-font">
        <div
            class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
            <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
                <a href="{{ route('index') }}"
                   class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2"
                         class="w-10 h-10 text-white p-2 bg-yellow-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl">DreamHouse</span>
                </a>
                <p class="mt-2 text-sm text-gray-500">Junto com você realizando o seu sonho da casa própria</p>
            </div>
            <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CASAS</h2>
                    <nav class="list-none mb-10">
                        <ul>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Casas a Venda</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Locações</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Terrenos</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Casas na planta</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">A Empresa</h2>
                    <nav class="list-none mb-10">
                        <ul>
                            <li>
                                <a href="{{ route('pages.aboutus') }}" class="text-gray-600 hover:text-gray-800">Sobre Nós</a>
                            </li>
                            <li>
                                <a href="{{ route('pages.team') }}" class="text-gray-600 hover:text-gray-800">Nossa Equipe</a>
                            </li>
                            <li>
                                <a href="{{ route('pages.careers') }}" class="text-gray-600 hover:text-gray-800">Carreiras</a>
                            </li>
                            <li>
                                <a href="{{ route('pages.contact') }}" class="text-gray-600 hover:text-gray-800">Contato</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">Imprensa</h2>
                    <nav class="list-none mb-10">
                        <ul>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Investidores</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Parceiros</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Termos e condições</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-800">Notas Oficiais</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                <p class="text-gray-500 text-sm text-center sm:text-left">© 2022 DreamHouse — Desenvolvido por Israel
                    Cena
                    <a href="https://twitter.com/israelcena" rel="noopener noreferrer" class="text-gray-600 ml-1"
                       target="_blank">@israelcena</a>
                </p>
                <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
        <a class="text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
               viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
               viewBox="0 0 24 24">
            <path
                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
               class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none"
                  d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span>
            </div>
        </div>
    </footer>
@show
</body>
</html>
