<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-lg text-gray-800 leading-tight ">
            {{ __('Products') }}
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" id="add" class="rounded-lg text-sm px-2 font-bold shadow p-1 text-white bg-green-600 hover:bg-green-700" >+</button>
        </div>
    </x-slot>
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        @include('products.create-modal')
    </x-modal>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                @if($product->status === 1)
                                    Available
                                @else
                                    Not Available
                                @endif
                            </div>

                            <div class="my-auto">
                                {{$product->name}}
                            </div>

                            <div class="my-auto">
                                Price:
                                {{$product->price}}$
                            </div>
                            <div class="my-auto flex">
                                <button class="rounded-lg shadow p-3 text-white bg-green-600 hover:bg-green-700 mr-2">Edit</button>
                                <form action="{{route('products.destroy', $product->id)}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="rounded-lg shadow p-3 text-white bg-red-600 hover:bg-red-700">Delete</button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
