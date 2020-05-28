<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =[
        'photo','post_id','author','body','is_active','email'
     ];

     public function replies(){
        return $this->hasMany('App\CommentReply');
        
    }
    public function post(){
        return $this->belongsto('App\Post');
        
    }


}
