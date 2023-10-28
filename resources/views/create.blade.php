<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">

                    <p class="c_p"><span style="color: rgb(0, 255, 0)">*</span>全ての項目入力必須</p>
                    <form method="post" action="{{ route('store') }}" enctype="multipart/form-data" class="create_flex">
                        @csrf
                        <div class="main">
                            @error('image_path')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            <input type="file" name="image_path" id="imageInput" value="{{ old('image_path') }}">
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none;">
                        </div>

                        <div class="side">
                            <div class="name">商品名
                                <span style="margin-right: 50px;"></span>
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <input type="text" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="category">カテゴリー
                                <span style="margin-right: 55px;"></span>
                                @error('category')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <select name="category" value="{{ old('category') }}">
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
                                <select name="condition" value="{{ old('condition') }}">
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
                                <input type="text" name="price" value="{{ old('price') }}">
                            </div>

                            <div class="memo">
                                商品説明
                                <span style="margin-right: 50px;"></span>
                                @error('memo')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <textarea name="memo" cols="30" rows="10">{{ old('memo') }}</textarea>
                            </div>
                            <div class="createbtn">
                                <x-button class="ml-3" id="btn">
                                    {{ __('出品する') }}
                                </x-button>
                            </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <script>
        document.getElementById('imageInput').addEventListener('change', function() {
            var input = this;
            var imagePreview = document.getElementById('imagePreview');

            // 選択したファイルが存在する場合
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                // ファイルが読み込まれたときの処理
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; // 画像プレビューを表示
                };

                // 選択されたファイルを読み込む
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
</x-app-layout>
