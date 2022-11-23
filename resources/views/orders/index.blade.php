<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                     @foreach($orders as $order)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                    <div class="p-6 text-gray-900 flex justify-between">
                         <div>
                             Order ID: {{ $order->cart_id }}
                         </div>
                        <div>
                            Created at: {{ date('d M H:i', strtotime($order->created_at)) }}
                        </div>
                        <div>
                            @if($order->status === 1)
                                Status: Accepted
                            @else
                                <button class="p-1 border-green-600 rounded-lg bg-green-600 hover:bg-green-800 text-white shadow">Done</button>
                            @endif
                        </div>
                    </div>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-left text-gray-500 ">
                            <thead class=" text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Quantity
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Price
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->carts as $items)
                            <tr class="bg-white border-b ">
                                @foreach($items->products as $item )
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                    {{$item->name}}
                                </th>
                                <td class="py-4 px-6">
                                    {{$items->quantity}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$item->price}}
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    @endforeach

        </div>
    </div>
</x-app-layout>
