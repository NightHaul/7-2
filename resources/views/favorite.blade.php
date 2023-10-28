<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">

                    @if (empty($favoritesData))

                        <p class="zero">お気に入りはありません</p>
                    @else
                        @foreach ($favoritesData as $data)
                            <div class="flex-item">

                                <div class="fleximg2">
                                    <img src="{{ asset($data['imagePath']) }}" alt="Item Image"
                                        class="list_name img_path">
                                </div>
                                <p class="list_name item_name">
                                    @if (strlen($data['itemName']) > 20)
                                        {{ mb_substr($data['itemName'], 0, 20) . '...' }}
                                    @else
                                        {{ $data['itemName'] }}
                                    @endif
                                </p>



                                <p class="list_name item_create" style=" color: rgb(97, 97, 97);"><span
                                        style="color: rgb(0, 255, 0)">¥</span>{{ $data['price'] }}</p>

                                <a href="{{ route('show', $data['itemId']) }}" id="editBtn" class="editBtn">
                                    <x-button class="ml-3">{{ __('買う') }}</x-button>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

</x-app-layout>
