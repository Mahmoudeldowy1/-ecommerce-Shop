<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use ImageTrait;

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $categoryRows = count($categories);
           if (!empty($categoryRows))
             {
                 return view('admin.products.create',compact('categories'));
            }else
            {
                session()->flash('create-category','Please Create Category First');
                return redirect()->route('categories.create');
            }
    }


    public function store(ProductRequest $request)
    {


        $file_name = $this->saveImage($request->image , 'images/products');

        Product::create([
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en'],
            'category_id'=>$request['category_id'],
            'price' => $request['price'],
            'expiration_date' => $request['expiration_date'],
            'image' => $file_name,
        ]);

        session()->flash('product-created-message','Product was created');
        return redirect()->route('products.index');
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit' , compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $file_name = $this->saveImage($request->image , 'images/products');

        $product->update([
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en'],
            'category_id'=>$request['category_id'],
            'price' => $request['price'],
            'expiration_date' => $request['expiration_date'],
            'image' => $file_name,
        ]);
        session()->flash('product-updated-message','Product was Updated');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('product-deleted-message','Product was Deleted');
        return redirect()->route('products.index');
    }
}
