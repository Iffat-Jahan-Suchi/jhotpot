<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $category;
    private static $categories;
    private static $brand;
    private static $brands;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageURL;

    public static function  getImageURL($request)
    {
        self::$image=$request->file('image');
        self::$imageName=self::$image->getClientOriginalName();
        self::$directory='brand-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;
    }
    public static function saveBasicInfo($brand,$request,$imageURL)
    {
        $brand->category_id    =$request->category_id;
        $brand->name           =$request->name;
        $brand->description    =$request->description;
        $brand->image          =$imageURL;
        $brand->save();
    }
    public static function createBrand($request)
    {
        self::$brand = new Brand();
        Brand::saveBasicInfo(self::$brand,$request,self::getImageURL($request));
    }

    public static function updateBrand($request,$id)
    {
        self::$brand =Brand::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }

            self::$imageURL=self::getImageURL($request);

        }

        else{

            self::$imageURL=self::$brand->image;
        }
       Brand::saveBasicInfo(self::$brand,$request,self::$imageURL);
    }

    public static function  deleteBrand($id)
    {
        self::$brand=Brand::find($id);
        if(file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }




    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
