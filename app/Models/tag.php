<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //

    public function blogs(){
        return $this->belongsToMany(Blog::class);
    }
    
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
  
}
