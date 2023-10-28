<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black" >
            @include('layouts.navigation')
            <div class="greenborder"></div>
            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer>
                <div class="greenborder"></div>
                <div class="foo_flex">
                    <div class="trade">
                        <img src="{{ asset('img/logo3.png') }}" alt="ロゴ" class="logo">
                        <p class="inc">© 2023 Tradeing Inc.</p>
                    </div>
                    <ul class="foo_ul">
                        <li class="foo_li"><a href="{{route('dasha')}}">ご利用にあたって</a></li>
                        <li class="foo_li"><a href="{{route('dashb')}}">利用規約</a></li>
                        <li class="foo_li"><a href="{{route('dashc')}}">プライバシーポリシー</a></li>
                        <li class="foo_li"><a href="{{route('dashd')}}">利用者契約</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </body>
</html>
