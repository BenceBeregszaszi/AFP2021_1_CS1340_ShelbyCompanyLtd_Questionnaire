<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>@yield('title')</title>

</head>

<body class="bg-maintain bg-gray-300 min-h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-100 py-6 mb-10 shadow-lg">
            <div class="container mx-auto flex justify-between items-center px-6">

                    <a href="{{ route('index') }}" class="font-sans font-light text-md lg:text-3xl">
                        Questionnaire
                    </a>

                    @guest
                    @else
                    <a href="{{ route('settings') }}" class="text-md lg:text-2xl font-light font-sans text-black px-2 py-3 rounded-md transition hover:text-white hover:bg-yellow-400">{{ __('Statisztika') }}</a>
                        <a href="{{ route('settings') }}" class="text-md lg:text-2xl font-light font-sans text-black px-2 py-3 rounded-md transition hover:text-white hover:bg-yellow-400">{{ __('Beállítások') }}</a>
                        <a href="{{ route('logout') }}"
                           class="text-md lg:text-2xl font-light text-black px-3 py-2 rounded-md font-sans transition hover:text-white hover:bg-red-500"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Kijelentkezés') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                    
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="text-md lg:text-2xl font-sans font-light text-black px-3 py-2 rounded-md transition hover:text-white hover:bg-blue-500" href="{{ route('login') }}">{{ __('Bejelentkezés') }}</a>
                        @if (Route::has('register'))
                            <a class="text-md text-black px-5 py-3 rounded-lg transition hover:text-white hover:bg-blue-500" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif                      

                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>
