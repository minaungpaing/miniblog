<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('website.index');
});
Route::get('/contact',function (){
    return view('website.contact');
});
Route::get('/post',function (){
    return view('website.post');
});
Route::get('/about',function (){
    return view('website.about');
});
Route::get('/category',function (){
    return view('website.category');
});

//admin Panel 
Route::group(['prefix'=>'admin','middleware' => ['auth']],function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard');
    });
    Route::resource('category','CategoryController');

    Route::resource('tag','TagController');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
