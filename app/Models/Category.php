<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category;
    private static $categories;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageURL;

    public static function getImageURl($request)
    {
        self::$image =$request->file('image');
        self::$imageName=self::$image->getClientOriginalName();
        self::$directory='category-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageURL=self::$directory.self::$imageName;
        return self::$imageURL;
    }
    public static function saveBasicInfo($category,$request,$imageURL)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageURL;
        $category->save();
    }
    public static function newCategory($request)
    {
        self::$category = new Category();
        Category::saveBasicInfo(self::$category,$request,self::getImageURl($request));

    }

    public static function updateCategory($request,$id)
    {
        self::$category=Category::find($id);

        if($request->file('image'))
        {
            if(file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageURL=self::getImageURl($request);

        }
        else{
            self::$imageURL=self::$category->image;
        }

        Category::saveBasicInfo(self::$category,$request,self::$imageURL);
    }
    public static function deleteCategory($id)
    {
        self::$category=Category::find($id);
        if(file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }


}
