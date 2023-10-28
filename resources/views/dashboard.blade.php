<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">

                    <div class="searchflex">
                        <form method="POST" action="{{ route('search') }}" id="search-form" class="searchflex">
                            @csrf
                            <div>
                                <input type="search" placeholder="何かお探しですか？" name="search"
                                    value="{{ isset($search) ? $search : '' }}">
                            </div>
                            <div>
                                <x-button class="ml-3" id="btn">
                                    {{ __('検索') }}
                                </x-button>
                            </div>

                        </form>
                    </div>
                </div>


                <div class="item-container" id="item-container">

                    @foreach ($items as $item)
                        @if ($item->visible)
                            <div class="bash_item">
                                <a href="{{ route('show', $item) }}">
                                    <div class="fleximg">
                                        <img src="{{ asset($item->image_path) }}" alt="Item Image" class="bash img">
                                    </div>

                                    <div class="bash_memo" id="item-name">
                                        <span id="item-name-content">{{ $item->name }}</span>
                                        <a href="#" id="toggle-text">...</a>
                                    </div>
                                </a>

                                <div class="bash_flex">
                                    <div class="bash_memo2"><span
                                            style="color: rgb(0, 255, 0)">¥</span>{{ number_format($item->price) }}


                                        <div class="heart {{ $item->is_favorite ? ' animate-heart' : '' }}"
                                            id="heart" data-item-id="{{ $item->id }}"></div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>





            </div>
        </div>
    </div>
    </div>



    <script>
        // ーーーーーーーーーーーーーーーーーーーーーーーー
        document.addEventListener('DOMContentLoaded', function() {
            const itemName = document.getElementById('item-name-content');
            const toggleLink = document.getElementById('toggle-text');
            const maxLength = 25;

            if (itemName.textContent.length > maxLength) {
                // テキストが制限文字数を超える場合、テキストを短縮して表示
                itemName.textContent = itemName.textContent.substring(0, maxLength) + '...';

            } else {
                // 制限文字数を超えない場合、"..."を非表示にする
                toggleLink.style.display = 'none';
            }
        });





        const hearts = document.querySelectorAll('.heart');

        hearts.forEach(function(heart) {
            const itemId = heart.getAttribute('data-item-id');

            // localStorageからハートの初期状態を確認
            const isLiked = localStorage.getItem(`like-${itemId}`) === 'true';

            // localStorageの状態に基づいてハートの初期色を設定
            if (isLiked) {
                heart.classList.add('animate-heart');
            } else {
                heart.classList.remove('animate-heart');
            }

            heart.addEventListener('click', function() {
                // ... その他のコード ...

                if (heart.classList.contains('animate-heart')) {
                    // ハートがすでにいいねされている場合、いいねを解除
                    heart.classList.remove('animate-heart');
                    localStorage.setItem(`like-${itemId}`, 'false');

                    // データベースからいいね情報を削除する非同期通信
                    fetch(`/remove-from-favorites/${itemId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data.message); // サーバーからの応答をログに出力
                        })
                        .catch(error => {
                            console.error('エラーが発生しました:', error);
                        });

                    // ... その他のコード ...
                } else {
                    // ハートがいいねされていない場合、いいねを追加
                    heart.classList.add('animate-heart');
                    localStorage.setItem(`like-${itemId}`, 'true');

                    // データベースにいいね情報を登録する非同期通信
                    fetch(`/add-to-favorites/${itemId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data.message); // サーバーからの応答をログに出力
                        })
                        .catch(error => {
                            console.error('エラーが発生しました:', error);
                        });


                }
            });
        });
    </script>
</x-app-layout>
