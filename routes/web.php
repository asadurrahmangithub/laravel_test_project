<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/add-blog',[BlogController::class,'index'])->name('add-blog');
Route::post('/save-blog',[BlogController::class,'saveBlog'])->name('save-blog');
Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage-blog');
Route::get('/publication_status/{id}',[BlogController::class,'publicationStatus'])->name('publication-status');
Route::post('/delete',[BlogController::class,'delete'])->name('delete');
Route::get('/edit/{id}',[BlogController::class,'edit'])->name('edit-blog');
Route::post('/update-blog',[BlogController::class,'update'])->name('update-blog');



Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add-category');

Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new-category');
Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage-category');


