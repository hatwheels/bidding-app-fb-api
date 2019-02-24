<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('/img/icons/favicon.ico') }}" rel="shortcut icon">
    <link href="{{ asset('/img/icons/touch.png') }}" rel="apple-touch-icon-precomposed">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body class="h-screen w-screen font-sans antialiased">
    <div id="app" class="h-full w-full">
        <div class="h-full w-full flex flex-col">
            <nav class="bg-teal-light w-full h-16 ">
                <div class="flex items-center justify-between h-full">
                    <a href="{{ url('/') }}">
                        <img class="block h-12 w-12 ml-8"
                            src="{{ asset('/img/icons/favicon-32x32.png') }}"
                            alt="bidding-app-logo">
                    </a>
                    <div class="text-lg">
                        <!-- Authentication Links -->
                        @guest
                            <a class="mr-2 text-grey-darkest no-underline hover:text-teal" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="text-grey-darkest no-underline hover:text-teal" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <user-menu avatar="{{ asset('storage/' . Auth::user()->avatar) }}">
                                <template slot="menu-items">
                                    <div class="w-full h-full">
                                        <a class="inline-block p-4 no-underline w-full text-black hover:bg-teal-dark hover:text-grey-lighter"
                                            href="{{ route('products') }}"
                                        >
                                            {{ __('Product List') }}
                                        </a>
                                    </div>

                                    <div class="w-full h-full">
                                        <a class="inline-block p-4 no-underline w-full text-black hover:bg-teal-dark hover:text-grey-lighter"
                                            href="{{ route('bids') }}"
                                        >
                                            {{ __('My Bids') }}
                                        </a>
                                    </div>

                                    <div class="w-full h-full">
                                        <a href="{{ route('logout') }}"
                                            class="inline-block p-4 no-underline w-full text-black hover:bg-teal-dark hover:text-grey-lighter"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        >
                                            {{ __('Logout') }}

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </div>
                                </template>
                            </user-menu>
                        @endguest
                    </div>
                </div>
            </nav>

            <div class="flex flex-1">
                <main class="flex-grow overflow-y-auto">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
