<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use function Symfony\Component\HttpFoundation\Session\Storage\save;
use DB;

class BlogController extends Controller
{
    public $blog,$blogs;
    public function index(){
        return view('add-blog',[
            'categories'=>Category::where('publication_status',1)->get()
        ]);
    }
    public function manageBlog(){
        $this->blogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->select('blogs.*','categories.category')
            ->get();
        return view('manage-blog',[
            'blogs'=>$this->blogs,
        ]);
    }
    public function saveBlog(Request $request){
        Blog::newBlog($request);
        return redirect('manage-blog')->with('massage','Blog Section Add Successfully');
     }
     public function publicationStatus($id){
         $blog =Blog::find($id);
         if ($blog->publication_status==1){
             $blog->publication_status=2;
             $blog->save();
         }
         else{
             $blog->publication_status=1;
             $blog->save();
         }
         return back()->with('massage','Publication Status Update Successfully');

     }
     public function delete(Request $request){
        $blog = Blog::find($request->delete_id);
        if ($blog->image){
            unlink($blog->image);
        }
        $blog->delete();
        return back()->with('massage','Blog Delete Successfully');
     }
     public function edit($id){
        return view('edit-blog',[
            'blog' => Blog::find($id),
            'categories'=>Category::where('publication_status',1)->get()
        ]);
     }
    public function update(Request $request){
        Blog::blogUpdate($request);
        return redirect()->route('manage-blog')->with('message','Slider Update Successfully!');
    }
}
