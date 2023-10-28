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

                    {{-- {{ dd($items);}} --}}

                    @if ($items->isEmpty())
                        <p class="zero">出品した商品はありません</p>
                    @else
                        {{-- $itemsが空でない場合の処理 --}}
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

                            <p class="list_name item_price">¥{{ $item->price }}</p>

                            <div class="Btn_">
                                <a href="{{ route('edit', ['item' => $item->id]) }}"
                                    id="editBtn_{{ $item->id }}">
                                    <x-button class="ml-3">{{ __('編集') }}</x-button>
                                </a>
                                <form action="{{ route('destroy', $item) }}" method="post">
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
                 



                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            @foreach ($items as $item)
                                document.getElementById('deleteBtn_{{ $item->id }}').addEventListener('click', e => {
                                    e.preventDefault();

                                    if (!confirm('本当に消去しますか?')) {
                                        return;
                                    }

                                    e.target.closest('form').submit();
                                });
                            @endforeach
                        });

                        document.addEventListener('DOMContentLoaded', () => {
                            const successMessage = '{{ session('success_message') }}';

                            if (successMessage) {
                                alert(successMessage);
                            }
                        });
                    </script>
</x-app-layout>
