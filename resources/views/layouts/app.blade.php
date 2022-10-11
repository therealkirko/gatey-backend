<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{asset('css/dashlite.css?ver=2.8.0')}}">

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="nk-body bg-white npc-subscription has-aside ">
        <div class="nk-app-root">
            <div class="nk-main ">
                @include('layouts.navigation')

                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                            @include('components.side-nav')
                            <div class="nk-content-body">
                                <div class="nk-content-wrap">
                                    {{ $slot }}
                                </div>
                                @include('components.footer')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/bundle.js?ver=2.8.0') }}"></script>
    <script src="{{ asset('js/scripts.js?ver=2.8.0') }}"></script>
</html>
