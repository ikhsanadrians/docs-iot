<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Hashids\Hashids;
use Illuminate\Http\Request;


class IndexController extends Controller
{
     public function index(){
         $articleall = Article::all();
        return view('home',compact('articleall'));
    }

    public function show($slug){

         $article = Article::where('slug',$slug)->firstOrFail();

         return view('detail',compact('article'));
    }
}