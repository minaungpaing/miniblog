<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class FrontendController extends Controller
{
   public function home(){
       $posts = Post::orderBy('created_at','DESC')->take(5)->get();
       $recentPosts = Post::orderBy('created_at','DESC')->paginate(9);
       return view('website.index',compact('posts','recentPosts'));
   }
   public function about(){
       return view('website.about');
   }
   public function contact(){
    return view('website.contact');
   }
   public function post($slug){
    $post = Post::where('slug',$slug)->first();
    
    if($post){
        return view('website.post',compact('post'));
    }else{
        return redirect('/');
    }
    }
}
