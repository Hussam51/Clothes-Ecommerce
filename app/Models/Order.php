<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','number','status','payment_status','payment_method'];
    public static function booted()
    {
        static::creating(function (Order $order) {
            $order->number = Carbon::now();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function address()
    {
        return $this->belongsTo(OrderAddress::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
        ->using(OrderItem::class)
        ->withPivot('product_name','price','quantity','options');
    }
}
