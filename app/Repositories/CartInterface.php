<?php


namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

interface CartInterface{

    public function get(): Collection;
    public function add(Product $product,$quantity=1);
    public function update($id, $quantity=1);
    public function delete( $id);
    public function total();
    public function empty();
}
