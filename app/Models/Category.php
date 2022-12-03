<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category;
    public static function saveBlogCategory($request){
        self::$category = new Category();
        self::$category->category = $request->category;
        self::$category->publication_status = $request->publication_status;
        self::$category->save();


    }
}
