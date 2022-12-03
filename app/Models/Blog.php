<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Blog extends Model
{
    use HasFactory;

    private static $blog,$image,$imageName,$directory,$imageUrl;
    public static function getAllBlog(){
        return [
            0=>[
                'id'=>01,
                'title'=>'T-Shirt',
                'category'=>'Man',
                'author'=>'Asadur',
                'description'=>'Lorem Description',

            ],
            1=>[
                'id'=>02,
                'title'=>'T-Shirt',
                'category'=>'Man',
                'author'=>'Asadur',
                'description'=>'Lorem Description',
            ],
            2=>[
                'id'=>03,
                'title'=>'T-Shirt',
                'category'=>'Man',
                'author'=>'Asadur',
                'description'=>'Lorem Description',
            ],
            3=>[
                'id'=>03,
                'title'=>'T-Shirt',
                'category'=>'Man',
                'author'=>'Asadur',
                'description'=>'Lorem Description',
                ],
            4=>[
                'id'=>04,
                'title'=>'T-Shirt',
                'category'=>'Man',
                'author'=>'Asadur',
                'description'=>'Lorem Description',
            ],
        ];
    }

    public static function newBlog(Request $request){
        self::$blog = new Blog();
        self::$blog->title=$request->title;
        self::$blog->category_id=$request->category_id;
        self::$blog->author=$request->author;
        self::$blog->description=$request->description;
        self::$blog->image=self::image($request);
        self::$blog->publication_status=$request->publication_status;
        self::$blog->save();
    }
    private static function image(Request $request){
        self::$image = $request->file('image');
        self::$imageName = 'blog'.'-'.rand().'.'.self::$image->extension();
        self::$directory = 'blog/custom-image/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    public static function blogUpdate(Request $request){
        self::$blog = Blog::find($request->id);
        self::$blog->title = $request->title;
        self::$blog->category_id = $request->category_id;
        self::$blog->author = $request->author;
        self::$blog->description = $request->description;
        if ($request->file('image')){
            if (self::$blog->image){
                unlink(self::$blog->image);
            }
            self::$blog->image = self::image($request);
        }

        self::$blog->publication_status = $request->publication_status;
        self::$blog->save();

    }
}
