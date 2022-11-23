<x-guest-layout>
    <div class="container mx-auto p-3 ">
        <header class="flex  mt-5 font-bold text-2xl flex justify-between">
            <a href="/home" class="mr-5">Make order and pick up!</a>
            <a href="{{ route('cart.list') }}" class="flex items-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-red-700">{{ Cart::getTotalQuantity()}}</span>
            </a>
        </header>
        @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
        @endif
        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow-2xl">
                    <div class="p-6 text-gray-900">
                        @if(!$products)
                            Theres no products show!
                        @endif
                        @foreach($products as $product)

                            <div class="mt-5 p-3 border bg-gray-300/50 flex justify-between text-lg font-bold rounded-lg shadow-xl">

                                <div class="my-auto">
                                    <img src="#" alt="img" class="border rounded-full w-20 h-20 "/>
                                </div>
                                <div class="my-auto">
                                    {{$product->name}}
                                </div>

                                <div class="my-auto">
                                    Price:
                                    {{$product->price}}$
                                </div>
                                <div class="my-auto flex">
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="px-4 py-1.5 text-white text-sm bg-blue-600 rounded hover:bg-blue-800">Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
