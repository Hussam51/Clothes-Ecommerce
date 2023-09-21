<?php


namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartInterface
{
    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    public function get(): Collection
    {
        if (!$this->items->count()) {
            $this->items = Cart::with('product')
                ->get();
        }
        return $this->items;
    }

    public function add(Product $product, $quantity = 1)
    {
        $item = Cart::where('product_id', '=', $product->id)
            ->first();
        if (is_null($item)) {
            $user = Auth::id();

            Cart::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'user_id' => $user,


            ]);
        }
        $item->increment('quantity', $quantity);
    }
    public function update(Product $product, $quantity = 1)
    {
        Cart::where('product_id', '=', $product->id)
            ->update([
                'quantity' => $quantity
            ]);
    }
    public function delete($id)
    {
        Cart::where('product_id', '=', $id)
            ->delete();
    }
    public function total()
    {
        return (float) Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('SUM(products.price*carts.quantity) as total')
            ->value('total'); //return value of total row
    }
    public function empty()
    {
        Cart::query()->destroy();
    }
}