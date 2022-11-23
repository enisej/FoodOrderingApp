<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductsRequest;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::all('name', 'price', 'status', 'id');
        return view('products.index', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request){
        $product = new Products();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        if($request->input('status')==="on") {
            $product->status = 1;
        }
        $product->save();
        return redirect(route('products.index'));
    }

    public function destroy($id){
        $product = Products::find($id);
        $product->delete();

        return redirect(route('products.index'));
    }

    public function edit(){

    }
}
