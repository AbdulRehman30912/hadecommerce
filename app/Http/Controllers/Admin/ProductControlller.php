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
        $this->validate($request,[
            'full' => 'required'
        ]);
        $products = new Products;
        $products->name = $request->name;
        $products->maincategory_id =  json_encode($request->maincategory_id, true);
        $products->brand_id = $request->brand_id;
        $products->description = $request->description;
        $products->platforms = $request->platforms;
        $products->status = $request->status == true ? 1 : 0;
        $products->save();

        if ($request->hasFile('full')) {
            foreach ($request->file('full') as  $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move('storage/products/', $filename);
                $multiFiles[] = $filename;
            }
        }

        $proimg = new ProductImage;
        $proimg->product_id = $products->id;
        $proimg->full = json_encode($multiFiles);
        $proimg->save();

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }
    public function index()
    {
        $products = Products::all();
        return view('Admin.Products.index', compact('products'));
    }
}
