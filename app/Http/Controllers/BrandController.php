<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $category;
    private $categories;
    private $brand;
    private $brands;

    public function index()
    {
        $this->categories=Category::all();
        return view('admin.brand.add',['categories'=>$this->categories]);
    }
    public function create(Request $request)
    {
        Brand::createBrand($request);
        return redirect('/add-brand')->with('message','Brand Create Successfully');

    }
    public function manage()
    {
        $this->brands =Brand::orderBy('id','desc')->get();
        return view('admin.brand.manage',['brands'=>$this->brands]);
    }
    public function edit($id)
    {
        $this->brand=Brand::find($id);
        $this->categories=Category::all();
        return view('admin.brand.edit',['brand'=>$this->brand, 'categories'=>$this->categories]);
    }

    public function update(Request $request,$id)
    {
        Brand::updateBrand($request,$id);
        return redirect('/manage-brand')->with('message','Brand Update Successfully');
    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('/manage-brand')->with('message','Brand Delete Successfully');

    }

}
