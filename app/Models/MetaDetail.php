<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaDetail extends Model
{
    //

    protected $guarded = [];
    // protected $appends = ['blog'];


    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class);
    // }

    public function meta()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
}
