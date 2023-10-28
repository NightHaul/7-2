<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white ">

                        <div class="container2" >

                            <div class="main2">
                                <img src="{{ asset($item->image_path) }}" alt="Item Image" class="list_name img_path2">
                            </div>

                            <div class="side2">
                                <div class="name2">{{ $item->name }}</div>

                                <div class="category2"><span >Category</span><br>{{ $item->category }}
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


{{-- <form method="post" action="{{ route('update',$item) }}" class="create_flex">

    <div class="main">
        <img src="{{ asset($item->image_path) }}" alt="Item Image" class="list_name img_path">
    </div>
    <div class="side">
        <div class="name">商品名
            <span style="margin-right: 50px;"></span>
            <div class="name2">{{ $item->name }}
        </div>
        <div class="category">カテゴリー
            <span style="margin-right: 55px;"></span>
            <span >Category</span><br>{{ $item->category }}
        </div>
        <div class="condition">状態
            <span style="margin-right: 80px;"></span>
            @error('condition')
            <div class="error">{{ $message }}</div>
        @enderror
            <select name="condition" value="{{old('condition', $item->condition)}}">
                <option value="S">S</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        <div class="price">値段
            <span style="margin-right: 80px;"></span>
            @error('price')
            <div class="error">{{ $message }}</div>
        @enderror
            <input type="text" name="price" value="{{old('price', $item->price)}}">
        </div>

        <div class="memo">
            商品説明
            @error('memo')
            <div class="error">{{ $message }}</div>
        @enderror
            <textarea name="memo"  cols="30" rows="10">{{old('memo',$item->memo)}}</textarea>
        </div>
        <div>
            <x-button class="ml-3" id="btn">
                {{ __('編集完了') }}
            </x-button>
        </div>
    </div>

</form>
</div>
</div>

</div>
</div> --}}
