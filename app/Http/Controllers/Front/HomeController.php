<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
      $categories=Category::all();
      $products=Product::all();
        return view('front.categoriesproducts',compact('categories','products'));
    }

    public function categoryProducts(Category $category){
       $products= $category->products;
        return view('front.categoryProducts',compact('products'));

    }
}
