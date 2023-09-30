<?php

namespace App\Http\Controllers\Front;

use App\Events\CreateOrder;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use App\Repositories\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrderController extends Controller
{
    public $cart;

    public function __construct(CartInterface $cart)
    {

        $this->cart = $cart;
    }
    public function create()
    {

        return view('front.checkout', ['cart' => $this->cart]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => Auth::id(),



            ]);
            foreach ($this->cart->get() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,


                ]);
            }
      OrderAddress::create([
        'order_id'=>$order->id,
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'phone_number'=>$request->phone_number,
        'street_address'=>$request->street_address,
        'zip_code'=>$request->zip_code,
        'city'=>$request->city,
        'state'=>$request->state,
        'country'=>$request->country,
      ]);

            DB::commit();
            event(new CreateOrder($order));

        } catch (Throwable $e) {
            DB::rollBack();
        }


    }
}
