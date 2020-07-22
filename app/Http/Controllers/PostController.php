<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = POST::orderBy('created_at','DESC')->paginate(20);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);

       
        $post = new Post ();
        $post->title = $request->title;
        $post->slug  = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->description = $request->description;
        $post->user_id     = Auth::id();
        $post->published_at = Carbon::now();
            
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filepath  = pathinfo($extension,PATHINFO_FILENAME);
            $fileNameToStore =time().'.'.$extension;
            $path = $file->storeAs('public/postimg',$fileNameToStore);
            $post->image = $fileNameToStore;
        }else{
            return $request;
            $post->image = ' ';
        }
        $post->save();
        $post->tags()->attach($request->tags);
        
        Session::flash('success','Post created successfully');
    
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       $tags = Tag::all();
       $categories = Category::all();
       return view('admin.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        $post->title = $request->title;
        $post->slug  = Str::slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category;
        if( $request->hasFile('image')){
            if($post->image){
                Storage::delete('public/postimg/'.$post->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filepath  = pathinfo($extension,PATHINFO_FILENAME);
            $fileNameToStore =time().'.'.$extension;
            $path = $file->storeAs('public/postimg',$fileNameToStore);

            $post->image = $fileNameToStore;
        }

        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success','Post Updated successfully');
    
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {  
        if($post){
            Storage::delete('public/postimg/'.$post->image);
            $post->delete();
            Session::flash('success','Post deleted Successfully');
            return redirect()->route('post.index');
        }
    }
}
