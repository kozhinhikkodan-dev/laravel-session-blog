<?php

namespace App\Models;

use Database\Factories\BlogsFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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
    // protected $appends = ['comments'];

    
    // protected function slug(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => str_replace('_', '-', $value),
    //         set: fn (string $value) => str_replace('-', '_', $value),
    //     );
    // }

    // protected function title(): Attribute
    // {
    //     return Attribute::make(
    //         // get: fn (string $value) => str_replace('_', '-', $value),
    //         set: fn (string $value) => ucfirst($value),
    //     );
    // }

    protected static function newFactory()
    {
        return BlogsFactory::new();
    }

    public function scopeFindBySlug(Builder $builder,String $slug){
        return $builder->where('slug',$slug)->firstOrFail();

    }

    public function scopeLastMonthRecords(Builder $builder){
        // 
        $startingDate = now()->subMonth()->startOfMonth();
        $endingDate = now()->subMonth()->endOfMonth();
        // return $builder->where('created_at','<=',$endingDate)->where('created_at','>=',$startingDate);
        // return $builder->where(
        //     [
        //         ['created_at','<=',$endingDate],
        //         ['created_at','>=',$startingDate]
        //     ]
        // );

        return $builder->whereBetween('created_at',[$startingDate,$endingDate]);
        
    }

    public function scopeLastMonthsRecords(Builder $builder,int $noOfMonths){
        // 
        $startingDate = now()->subMonths($noOfMonths)->startOfMonth();
        $endingDate = now()->subMonths($noOfMonths)->endOfMonth();
        // return $builder->where('created_at','<=',$endingDate)->where('created_at','>=',$startingDate);
        // return $builder->where(
        //     [
        //         ['created_at','<=',$endingDate],
        //         ['created_at','>=',$startingDate]
        //     ]
        // );

        return $builder->whereBetween('created_at',[$startingDate,$endingDate]);
        
    }

    public function meta(): MorphOne
    {
        return $this->morphOne(MetaDetail::class,'meta');
    }

    // public function comments(){
    //     return $this->hasMany(Comment::class);
    // }

        public function comments(){
            return $this->morphMany(Comment::class,'commentable');
        }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
