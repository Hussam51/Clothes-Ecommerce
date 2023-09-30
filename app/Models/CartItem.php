<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartItem extends Model
{
    use HasFactory;
    public $table="order_items";
    public $fillable=['order_id'];
}
