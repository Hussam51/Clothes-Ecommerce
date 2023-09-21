<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\CategorySize;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $products = Product::with('tags')->latest()->paginate(5);
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.products.create', compact('tags', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {

        $input = $request->except('image', 'tags');

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = $img->getClientOriginalName();
            $imageUrl = $img->storeAs('public/products', $name);
        }
        $input['image'] = $imageUrl;

        $product = Product::create($input);
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $productTags = $product->tags->pluck('id', 'id')->all();
        return view('admin.products.edit', compact('product', 'tags', 'categories', 'productTags'));
    }

    public function update(Request $request, Product $product)
    {
        $input = $request->except('image');
        $imageUrl = $product->image;
        if ($request->hasFile('image')) {
            if (!is_null($product->image)) {
                Storage::delete($product->image);
            }
            $img = $request->file('image');
            $name = $img->getClientOriginalName();
            $imageUrl = $img->storeAs('public/products', $name);
        }

        $input['image'] = $imageUrl;
        $product->update($input);
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }
        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if (!is_null($product->image)) {
            Storage::delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function indexsizes(Product $product)
    {
        $sizes = CategorySize::where('category_id', $product->category_id)->get();
        $productsizes = $product->productSizes->pluck('id','id')->all();
        return view('admin.products.sizes', compact('product', 'sizes', 'productsizes'));
    }

    public function storesizes(Product $product,Request $request)
    {

        $product->productSizes()->sync($request->sizes);

        return back()->with('success','add size successfully');
    }
}
