<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function create()
    {
     return view('Admin.categories.create');
    }

    public function store(Request $request)
    {
      $category= new Categories;
      $category->maincategory= $request->maincategory;
      $category->save();
      return redirect()->back()->with('success','Category Created Successfully!');
    }
}
