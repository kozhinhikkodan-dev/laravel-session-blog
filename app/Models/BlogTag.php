<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $guarded = [];
    protected $table = 'blog_tag';

    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    
}
