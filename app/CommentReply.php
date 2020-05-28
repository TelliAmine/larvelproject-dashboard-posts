<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable =[
       'post_id','author','body','is_active','email'
    ];
    public function comment(){
        return $this->belongsTo('App\Comment');
        
    }
}
