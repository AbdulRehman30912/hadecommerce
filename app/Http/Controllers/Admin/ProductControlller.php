<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductControlller extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('Admin.Products.index', compact('products'));
    }
    public function create()
    {
        $category = Categories::all();
        $brand = Brands::all();
        return view('Admin.Products.create', compact('category', 'brand'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
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

        if($request->hasFile('full'))
        {
            foreach($request->file('full') as $file)
            {
                $filename= time().'.'.$file->getClientOriginalName();
                $file->move('storage/products/',$filename);
                ProductImage::create([
                    'product_id' => $products->id,
                    'full' => $filename,
                ]);
            }
        }
        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product= Products::find($id);
        $brands= Brands::all();
        $categories= Categories::all();
        return view('Admin.Products.edit',compact('product','brands','categories'));
    }

    public function delImage($id)
    {
        $delimg= ProductImage::find($id);
        Storage::delete($delimg->path);
        $delimg->delete();
        return redirect()->back();
    }
}
