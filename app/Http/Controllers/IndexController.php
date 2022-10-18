<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Hashids\Hashids;
use Illuminate\Http\Request;


class IndexController extends Controller
{
     public function index(Request $request){
            $articleall = [];
            if($request->ajax()){
               if($request->has('searchQuest')){
                $articleall = Article::where('title','like','%'.$request->searchQuest.'%')->get();
                return json_encode($articleall);
            }}
            else {
                $articleall = Article::all();
            }
            return view('home',compact('articleall'));


    }

    public function show($slug){

         $article = Article::where('slug',$slug)->firstOrFail();

         return view('detail',compact('article'));
    }

}