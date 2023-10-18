<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('address')->paginate(10);

         return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update($id,Request $request)
    {

        $user = Order::find($id)
        ->update(['status'=>$request->status]);
        return json_encode(array('statusCode'=>200));
    }
}
