<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //

    public function blogs(){
        return $this->belongsToMany(Blog::class);
    }
}
