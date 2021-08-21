<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;

class BrandController extends Controller
{
    public function create()
    {
        return view('Admin.brands.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|max:2048'
        ]);
        $brand = new Brands;
        $brand->name = $request->brand;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('storage/brands/', $filename);
            $brand->img = $filename;
        }
        $brand->save();
        return redirect()->back()->with('success', 'Brand created successfully!');
    }
}
