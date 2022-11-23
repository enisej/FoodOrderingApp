<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Cart;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::all();

        return view('orders.index' , ['orders' => $orders]);
    }

    public function destroy($id){

    }

    public function edit(){

    }

}
