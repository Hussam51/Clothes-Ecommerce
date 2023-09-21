<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $fillable = ['product_id', 'user_id', 'cookie_id', 'quantity', 'options'];


    protected static function booted()
    {
        static::observe(CartObserver::class);

        static::addGlobalScope('cookie_id', function (Builder $builder) {
            $builder->where('cookie_id', '=', Cart::getCookieId());
        });
    }

    public function product()
    {
        return  $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return  $this->belongsTo(User::class, 'user_id', 'id');
    }


    public static function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id);
        }
        return $cookie_id;
    }
}
