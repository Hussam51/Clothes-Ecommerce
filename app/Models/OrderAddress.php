<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
    protected $table="order_addresses";

    protected $fillable = [
        'order_id', 'first_name', 'last_name', 'email','street_address',
        'phone_number', 'zip_code', 'city', 'state', 'country'
    ];
}
