<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">
                    <div style="background-color: black">
                        <p class="c_p"><span style="color: rgb(0, 255, 0)">*</span>全ての項目入力必須</p>
                        <form method="post" action="{{ route('update',$item) }}" class="create_flex">
                            @method('PATCH')
                            @csrf
                            <div class="main">
                                @error('image_path')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <input type="file" name="image_path" value="{{old('image_path', $item->image_path)}}">
                            </div>
                            <div class="side">
                                <div class="name">商品名
                                    <span style="margin-right: 50px;"></span>
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="name" value="{{ old('name',$item->name) }}">
                                </div>
                                <div class="category">カテゴリー
                                    <span style="margin-right: 55px;"></span>
                                    @error('category')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                    <select name="category" value="{{old('category', $item->category)}}">
                                        <option value="アパレル">アパレル</option>
                                        <option value="電化製品">電化製品</option>
                                        <option value="食品">食品</option>
                                        <option value="キッズ・ホビー">その他</option>
                                        <option value="雑貨">雑貨</option>
                                        <option value="その他">その他</option>
                                    </select>
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
        </div>
    </div>
</x-app-layout>
