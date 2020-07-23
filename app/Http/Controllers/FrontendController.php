<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class FrontendController extends Controller
{
   public function home(){
       $posts = Post::all()->take(5);
       $firstpost2 = $posts->splice(0,2);
       $middlepost = $posts->splice(0,1);
       $lastpost   = $posts->splice(0);

       $footerPost = Post::inRandomOrder()->limit(4)->get();
       $firstFooterPost = $footerPost->splice(0,1);
       $firstFooterPost2 = $footerPost->splice(0,2);
       $lastFooterPost = $footerPost->splice(0,1);

       $recentPosts = Post::orderBy('created_at','DESC')->paginate(9);
       return view('website.index',compact('posts','recentPosts','firstpost2','middlepost','lastpost'
       ,'firstFooterPost','firstFooterPost2','lastFooterPost'));
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
    public function category(){
        return view('website.category');
    }
}
