<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CartInterface;
use App\Repositories\CartModelRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartInterface $cart)
    {


        return view('front.cart', ['cart'=>$cart]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CartInterface $cart)
    {

        $request->validate([
            'product_id' => 'required',
            'quantity' => ['nullable', 'int', 'min:1']
        ]);
        $product = Product::find($request->product_id);
        $cart->add($product, $request->quantity);
        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartInterface $cart)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => ['nullable', 'int', 'min:1']
        ]);
        $product = Product::find($request->post('product_id'));
        $cart->update($product, $request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( CartInterface $cart,$id)
    {
        $cart->delete($id);
    }

    public function empty(CartInterface $cart)
    {
        $cart->empty();
    }

    public function total(CartInterface $cart)
    {
        $cart->total();
    }
}
