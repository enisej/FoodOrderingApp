<?php

namespace App\Http\Controllers;


use App\Http\Requests\OrderStoreRequest;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    public function sendNotification()
    {
        $user = User::first();

        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];

        Notification::send($user, new OrderNotification($details));

        dd('done');
    }

    public function index(){
        $products = Products::all('name', 'price', 'status', 'id')
        ->where('status');

        return view('welcome', ['products' => $products]);
    }

    public function userOrders(){

        return view('orders.user-orders');
    }

    public function cartList(Request $request)
    {
        $cartItems = \Cart::getContent();
        //dd($cartItems);
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('home.index');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addOrder(OrderStoreRequest $request){
        $items = \Cart::getContent();

        foreach ($items as $item){
            $cart = new Cart();
            $cart->cart_id = \session()->getId();
            $cart->product_id = $item->id;
            $cart->quantity = $item->quantity;
            $cart->save();
        }

        $order = new Orders();

        $order->cart_id = \session()->getId();

        $order->save();

        \Cart::clear();

        session()->flash('success', 'Your order was submited!');

        //session()->regenerate();

        return redirect()->route('home.index');
    }



}
