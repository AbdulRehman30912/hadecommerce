<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductControlller extends Controller
{
    public function create()
    {
        $category = Categories::all();
        $brand = Brands::all();
        return view('Admin.Products.create', compact('category', 'brand'));
    }
    public function store(Request $request)
    {
        $products = new Products;
        $products->name = $request->name;
        $products->maincategory_id =  json_encode($request->maincategory_id, true);
        $products->brand_id = $request->brand_id;
        $products->description = $request->description;
        $products->platforms = $request->platforms;
        $products->save();

        $files = [];
        if ($request->hasFile('full')) {
            foreach ($request->file('full') as  $file) {
                $filename = time() . '.' . $file->extension();
                $file->move('storage/products/', $filename);
                $files[] = $filename;
            }
        }
        $filess = new ProductImage;
        $filess->product_id = $products->id;
        $filess->full = $files;
        $filess->save();
        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }
    public function index()
    {
        $products = Products::all();
        return view('Admin.Products.index', compact('products'));
    }
}
