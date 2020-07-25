<?php

use Illuminate\Support\Facades\Route;


// frontendController

Route::get('/','FrontendController@home' )->name('web');
Route::get('/post/{slug}','FrontendController@post')->name('post');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::get('/about','FrontendController@about')->name('about');
Route::get('/category/{slug}','FrontendController@category')->name('category');


//admin Panel 

Route::group(['prefix'=>'admin','middleware' => ['auth']],function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard');
    });
    Route::resource('category','CategoryController');

    Route::resource('tag','TagController');

    Route::resource('post','PostController');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');








// online image adding

// Route::get('/test',function(){
//     $posts = App\Post::all();
//     $id = 60;

//     foreach($posts as $post){
//         $post->image ="https://picsum.photos/id/".$id."/600/400.jpg";
//         $post->save();
//         $id++; 
//     }
   
//     return $posts;
// });