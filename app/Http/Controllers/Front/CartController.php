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
    public $cart;

    public function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
    }


    public function index()
    {


        return view('front.cart', ['cart' => $this->cart]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required',
            'quantity' => ['nullable', 'int', 'min:1']
        ]);
        $product = Product::find($request->product_id);
        $this->cart->add($product, $request->quantity);
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
    public function update($id, Request $request,)
    {
        $request->validate([
            'quantity' => ['nullable', 'int', 'min:1'],
        ]);

        $this->cart->update($id, $request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->cart->delete($id);
    }

    public function empty()
    {
        $this->cart->empty();
    }

    public function total()
    {
        $this->cart->total();
    }
}
