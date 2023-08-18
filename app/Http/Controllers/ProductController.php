<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\subImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $categories;
    private $brands;
    private $units;
    private $product;
    private $products;
    private $categoryId;

    public function index()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();
        return view('admin.product.add', [
            'categories' => $this->categories,
            'brands' => $this->brands,
            'units' => $this->units
        ]);
    }

    public function getbrandbycategory()
    {
        $this->categoryId =$_GET['id'];
        $this->brands=Brand::where('category_id',$this->categoryId)->get();
        return response()->json($this->brands);
    }

    public function create(Request $request)
    {
        Product::createProduct($request);
        return redirect('add-product')->with('message', 'Product Create Successfully');

    }

    public function manage()
    {
        $this->products = Product::orderBy('id', 'desc')->paginate(5);
        return view('admin.product.manage', ['products' => $this->products]);
    }

    public function edit($id)
    {
        $this->product = Product::find($id);
        $this->categories = Category::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();
        $this->subImages = subImage::where('product_id', $id)->get();
        return view('admin.product.edit', [
            'product' => $this->product,
            'categories' => $this->categories,
            'brands' => $this->brands,
            'units' => $this->units,
            'subImages' => $this->subImages,
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request,$id);
        return redirect('manage-product')->with('message', 'product update successfully');
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect('manage-product')->with('message', 'product delete successfully');
    }


}
