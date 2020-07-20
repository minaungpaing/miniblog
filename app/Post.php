<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug','image','description','published_at','user_id','category_id'];
    
    public function category(){
        return $this->belongsTo('App\Category');
    } 

    public function user(){
        return $this->belongsTo('App\User');
    } 

    public function tags(){
        return $this->belongsToMany('App\Tag');
    } 
}
