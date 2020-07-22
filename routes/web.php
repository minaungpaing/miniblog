<?php

use Illuminate\Support\Facades\Route;


// frontendController

Route::get('/','FrontEndController@home' )->name('web');
Route::get('/post','FrontEndController@post' );
Route::get('/contact','FrontEndController@contact' );
Route::get('/about','FrontEndController@about' );
Route::get('/category','FrontEndController@category' );


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

Route::get('/test',function(){
    $posts = App\Post::all();
    $id = 60;

    foreach($posts as $post){
        $post->image ="https://picsum.photos/id/".$id."/600/400.jpg";
        $post->save();
        $id++; 
    }
   
    return $posts;
});