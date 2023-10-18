<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = ['name', 'status', 'image', 'price', 'quantity', 'category_id', 'description'];



    /////////////////*    start of  filter products     *////////////////
    public function scopeSearch(Builder $builder, $filterquery)
    {


        $builder->when($filterquery['name'] ?? false, function ($builder, $value) {

            $builder->where('name','LIKE',"%{$value}%");
        });

        $builder->when($filterquery['category'] ?? false, function ($builder, $value) {

            $builder->where('category_id', '=', $value);
        });

        $builder->when($filterquery['price_from'] ?? false, function ($builder, $value) {

            $builder->where('price', '>=', $value);
        });

        $builder->when($filterquery['price_to'] ?? false, function ($builder, $value) {

            $builder->where('price', '<=', $value);
        });

        $builder->when($filterquery['status'] ?? false, function ($builder, $value) {

            $builder->where('status', '=', $value);
        });
    }


    public function scopeActive(Builder $builder)
    {

        $builder->where('status', '=', 'active');
    }
    /////////////////*     end of filter products     *////////////////

    /////////////////////*    Relations   *//////////////////////////

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id', 'id');
    }

    // public function props(){
    //     return $this->belongsToMany(ProductProp::class,'product_props','product_id','prop_id','id');
    // }

    public function productSizes()
    {
        return $this->belongsToMany(CategorySize::class, 'product_sizes', 'category_id', 'category_size_id', 'id');
    }

    //////////////*    end of Relations    *////////////02

}
