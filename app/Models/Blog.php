<?php

namespace App\Models;

use Database\Factories\BlogsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model
{
    use HasFactory;

    protected static function newFactory()
{
    return BlogsFactory::new();
}
}
