<?php

namespace App\Models;

use Database\Factories\BlogsFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'slug',
    //     'author',
    //     'tags',
    //     'image',
    //     'category'
    // ];
    protected $guarded = [];

    
    // protected function slug(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => str_replace('_', '-', $value),
    //         set: fn (string $value) => str_replace('-', '_', $value),
    //     );
    // }

    protected function title(): Attribute
    {
        return Attribute::make(
            // get: fn (string $value) => str_replace('_', '-', $value),
            set: fn (string $value) => ucfirst($value),
        );
    }

    protected static function newFactory()
    {
        return BlogsFactory::new();
    }
}
