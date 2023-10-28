<x-app-layout>
    <x-slot name="header">

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">

                    <div class="container2">

                        <div class="main2">
                            <img src="{{ asset($item->image_path) }}" alt="Item Image" class="list_name img_path2">
                        </div>

                        <div class="side2">
                            <div class="name2">{{ $item->name }}</div>

                            <div class="category2"><span>Category</span><br>{{ $item->category }}
                            </div>

                            <div class="condition2"><span>Condition</span>
                                <br>{{ $item->condition }}
                            </div>

                            <div class="memo2"><span>Comment</span><br><br>{!! nl2br(e($item->memo)) !!}
                            </div>

                            <div class="price_show">¥{{ $item->price }} (税込)</div>

                            <a href="{{ route('buy', $item) }}" class="price2">

                                <x-button class="ml-3" id="btn2">
                                    {{ __('購入手続き') }}
                                </x-button>
                            </a>




                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
