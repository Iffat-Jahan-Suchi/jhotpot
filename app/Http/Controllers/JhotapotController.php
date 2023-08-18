<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class JhotapotController extends Controller
{
    Private $categories;
    private $products;
    private $product;
    private $category;
    private $category_id;
    private $reated_product;
    private $sliderProducts;

    public function index()
    {
        $this->categories=Category::all();
        $this->products=Product::orderBy('id','desc')->get();
        $this->sliderProducts=Product::orderBy('id','desc')->take(3)->get();

        return view('front.home.home',['categories'=>$this->categories,'products'=>$this->products,'sliderProducts'=>$this->sliderProducts

        ]);
    }

    public function categoryProduct($id)
    {
        $this->category=Category::where('id',$id)->first();
        $this->products=Product::where('category_id',$id)->orderBy('id','desc')->get();
        return view('front.category.category-product',['products'=>$this->products,'category'=>$this->category]);
    }

    public function productDetail($id)
    {
        $this->product=Product::where('id',$id)->first();
        $this->category_id =$this->product->category_id;
        $this->reated_products =Product::where('category_id',$this->category_id)->orderBy('id','desc')->take(5)->get();
        return view('front.product.product-detail',[
            'detailProduct'=>$this->product,
            'category_id'=>$this->category_id,
            'reated_products'=>$this->reated_products,
        ]);
    }

    public function search(Request $request)
    {
       $this->products=Product::orderBy('id','desc')->where('name','LIKE','%'.$request->product.'%')->get();
       return view('front.search.search',['products'=>$this->products]);
    }
}
