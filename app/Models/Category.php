<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "icon"
    ];

    public function articles(){
        return $this->belongsToMany(Article::class,'category_article')->withPivot('category_article');
    }


    public function category(){
        return $this->hasMany(Category::class);
       }

}