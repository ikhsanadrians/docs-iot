<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;


    protected $fillable = [
        "user_id",
        "title",
        "slug",
        "category_id",
        "description",
        "images",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'article_category');
    }


    public function getShortDescriptionAttribute()
    {
        return Str::limit(
            nl2br(strip_tags($this->description)),
            90
        );
    }

}