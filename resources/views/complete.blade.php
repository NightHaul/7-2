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



                    <p class="c_p"><span style="color: rgb(0, 255, 0)">*</span>商品の購入が完了しました</p>


                    <div class="buy_name">{{ $item->name }}</div>

                    {{-- <div class="buy_name">{{ $item->image_path }}</div> --}}
                    <img src="{{ asset($item->image_path) }}" alt="Item Image" class="list_name img_path3">



                    <a href="{{ route('dashboard') }}" class="price3">
                        <div class="btn_pr2">

                            <x-button class="ml-3" id="btn2">
                                {{ __('TOP') }}
                            </x-button>
                        </div>
                    </a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
