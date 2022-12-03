<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('add-category');
    }
    public function saveCategory(Request $request){
        Category::saveBlogCategory($request);
        return back()->with('massage','info save');
    }
    public function manageCategory(){
        return view('manage-category',[
            'categories' => Category::all(),
        ]);
    }
}
