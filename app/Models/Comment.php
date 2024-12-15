<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $guarded = [];

    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class,'commentable_id');
    // }

    // public function article()
    // {
    //     return $this->belongsTo(Article::class,'commentable_id');
    // }


    public function commentable()
    {
        return $this->morphTo();
    }

}
