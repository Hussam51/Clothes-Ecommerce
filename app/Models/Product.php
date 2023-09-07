<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable=['name','image','price','quantity','category_id','description'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id','id');
    }

    // public function props(){
    //     return $this->belongsToMany(ProductProp::class,'product_props','product_id','prop_id','id');
    // }
}
