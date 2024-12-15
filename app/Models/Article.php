<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    //
    use SoftDeletes;

    protected $guarded = [];

    public function scopeFindBySlug(Builder $builder,String $slug){
        return $builder->where('slug',$slug)->firstOrFail();

    }

    public function comments(){
        return $this->hasMany(Comment::class,'blog_id');
    }

}
