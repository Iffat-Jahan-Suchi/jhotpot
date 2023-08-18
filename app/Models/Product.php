<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $category;
    private static $categories;
    private static $brand;
    private static $brands;
    private static $unit;
    private static $units;
    private static $product;
    private static $products;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageURL;
    private static $images;
    private static $subImage;
    private static $subImages;


    public static function getImageURL($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'product-image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory . self::$imageName;
        return self::$imageURL;
    }

    public static function saveBasicInfo($product,$request,$imageURL)
    {
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->regular_price = $request->regular_price;
        $product->selling_price = $request->selling_price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image = $imageURL;
        $product->save();
    }
    public static function getSubImage($image)
    {

            self::$imageName = $image->getClientOriginalName();
            self::$directory = 'product-subimages/';
            $image->move(self::$directory, self::$imageName);
            self::$imageURL = self::$directory . self::$imageName;

            self::$subImage = new subImage();
            self::$subImage->product_id = self::$product->id;
            self::$subImage->image = self::$imageURL;
            self::$subImage->save();
    }

    public static function createProduct($request)
    {
        self::$product = new Product();
        Product::saveBasicInfo(self::$product,$request,self::getImageURL($request));
        self::$images = $request->file('sub_image');
        foreach (self::$images as $image)
        {
            Product::getSubImage($image);
        }

    }

    public static function updateProduct($request,$id)
    {
        self::$product = Product::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$imageURL=self::getImageURL($request);
        }
        else {
            self::$imageURL = self::$product->image;
        }
       Product::saveBasicInfo(self::$product,$request,self::$imageURL);


        if (self::$images = $request->file('sub_image')) {
            self::$subImages = subImage::where('product_id', $id)->get();
            foreach (self::$subImages as $subImage) {
                if (file_exists($subImage->image)) {
                    unlink($subImage->image);
                }
                $subImage->delete();
            }
            foreach (self::$images as $image) {
                Product::getSubImage($image);
            }
        }
    }

    public static function deleteProduct($id)
    {
        self::$product =Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();

        self::$subImages = subImage::where('product_id', $id)->get();
        foreach (self::$subImages as $subImage) {
            if (file_exists($subImage->image)) {
                unlink($subImage->image);
            }
            $subImage->delete();
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
    public function subImage()
    {
        return $this->hasMany('App\Models\subImage');
    }
}
