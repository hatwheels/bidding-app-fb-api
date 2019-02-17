<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('/img/icons/favicon.ico') }}" rel="shortcut icon">
        <link href="{{ asset('/img/icons/touch.png') }}" rel="apple-touch-icon-precomposed">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="h-screen w-screen font-sans antialiased">
        <main class="flex-grow overflow-y-auto bg-grey-lightest">
            @yield('content')
        </main>
        {{-- <div id="app" class="h-full w-full">
            <div class="h-full w-full flex flex-col">
                <nav class="bg-white w-full h-16 border-t-4 border-red">
                    <div class="border-b border-grey-light h-full">
                        @yield('navbar')
                    </div>
                </nav>

                <div class="flex flex-1">
                    @hasSection ('sidebar-items')
                        <v-sidebar>
                            @yield('sidebar-items')
                        </v-sidebar>
                    @endif


                    <main class="flex-grow overflow-y-auto bg-grey-lightest">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div> --}}
    </body>
</html>
