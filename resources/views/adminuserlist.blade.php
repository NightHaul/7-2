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

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-black">


        <nav x-data="{ open: false }" class="bg-white ">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">

                                <img src="{{ asset('img/logo2.png') }}" alt="ロゴ" class="logo">
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" class="black">
                            <x-nav-link :href="route('admindash')" :active="request()->routeIs('dashboard')" class="f_t">
                                {{ __('戻る') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admindash')" :active="request()->routeIs('dashboard')">
                                {{ __('') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admindash')" :active="request()->routeIs('dashboard')">
                                {{ __('') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admindash')" :active="request()->routeIs('dashboard')">
                                {{ __('') }}
                            </x-nav-link>

                            <x-nav-link id="backLink">
                                <a href="" style="color: wheat"> {{ __('') }}
                                </a>
                            </x-nav-link>
                        </div>
                    </div>



                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- スマホ用 --}}
            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 ">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>




        {{-- ・・・・・ --}}
        <div class="greenborder"></div>
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            </div>
        </header>

        <!-- Page Content -->
        <main>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white ">
                            @if (empty($items))
                                <p class="zero">出品した商品はありません</p>
                            @else
                                @foreach ($items as $item)
                                    <div class="flex-item">

                                        <div class="fleximg2">
                                            <img src="{{ asset($item->image_path) }}" alt="Item Image"
                                                class="list_name img_path">
                                        </div>

                                        <p class="list_name item_name">
                                            @if (strlen($item->name) > 20)
                                                {{ mb_substr($item->name, 0, 20) . '...' }}
                                            @else
                                                {{ $item->name }}
                                            @endif
                                        </p>




                                        <div class="Btn_">
                                            <form action="{{ route('admindestroy', ['item' => $item]) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" id="deleteBtn_{{ $item->id }}">
                                                    <x-button class="ml-3">{{ __('削除') }}</x-button>
                                                </a>
                                            </form>
                                        </div>



                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </main>
        <div class="greenborder"></div>
        <footer>
            <div class="kasen"></div>
            <div class="foo_flex">
                <div class="trade">
                    <img src="{{ asset('img/logo2.png') }}" alt="ロゴ" class="logo">
                    <p class="inc">© 2023 Tradeing Inc.</p>
                </div>

                <ul class="foo_ul">
                    <li class="foo_li"><a href="">ご利用にあたって</a></li>
                    <li class="foo_li"><a href="">利用規約</a></li>
                    <li class="foo_li"><a href="">プライバシーポリシー</a></li>
                    <li class="foo_li"><a href="">お問い合わせ</a></li>
                </ul>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.Btn_ a');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    var form = this.parentElement;
                    var url = form.action;

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                            },
                            body: JSON.stringify({
                                _method: 'DELETE'
                            })
                        })
                        .then(function(response) {
                            if (response.ok) {
                                alert('アイテムが削除されました。');
                            } else {
                                alert('このアイテムは既に購入されています。購入後のアイテムは削除できません。');
                            }
                            location.reload();
                        });
                });
            });
        });
    </script>
</body>

</html>
