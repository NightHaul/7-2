<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    @if (empty($purchaseData))
                        <p class="zero">購入した商品はありません</p>
                    @else
                        @foreach ($purchaseData as $data)
                            <div class="flex-item">
                                <div class="fleximg2">
                                    <img src="{{ asset($data['imagePath']) }}" alt="Item Image"
                                        class="list_name img_path">
                                </div>
                                <p class="list_name item_name">

                                    {{ $data['itemName'] }}

                                </p>

                                <p class="list_name item_create">{{ $data['itemCreate'] }}</p>


                            </div>
                        @endforeach
                    @endif



                </div>
            </div>
        </div>

</x-app-layout>
