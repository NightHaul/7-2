<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">

                    <p class="c_p"><span style="color: rgb(0, 255, 0)">*</span>支払い方法を選択してください</p>
                    <div class="selectflex">
                        <select class="settlement">
                            <option value="">
                                カード決済
                            </option>
                            <option value="">
                                代金引換
                            </option>
                            <option value="">
                                後払い決済
                            </option>
                        </select>
                    </div>
                    <div class="buy_name">{{ $item->name }}</div>
                    <form method="post" action="{{ route('complete', $item) }}">
                        @csrf

                        <img src="{{ asset($item->image_path) }}" alt="Item Image" class="list_name img_path3">

                        <div class="price_show2">¥{{ $item->price }} (税込)</div>

                        <a href="{{ route('buy', $item) }}" class="price3">

                            <x-button class="ml-3" id="btn2">
                                {{ __('購入') }}
                            </x-button>
                        </a>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="container">

                            <div class="main2">
                                <img src="{{ asset($item->image_path) }}" alt="Item Image" class="list_name img_path2">
                            </div>

                            <div class="side2">


                                <div class="category2"><span>Category</span><br>
                                    {{ $item->category }}
                                </div>

                                <div class="condition2">
                                    <span>Condition</span> <br>{{ $item->condition }}
                                </div>
                                <div class="memo2"><span>Comment</span><br><br>{!! nl2br(e($item->memo)) !!}
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

