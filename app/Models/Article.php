<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

}