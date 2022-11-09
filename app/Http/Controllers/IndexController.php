<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ArticleCategory;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Hashids\Hashids;
use Illuminate\Http\Request;


class IndexController extends Controller
{
     public function index(Request $request){
            $articlealls = "";
            $noresult = '<div class="bg-red-500 p-4 rounded-md font-semibold text-white list-none">No Result</div>';
            if($request->ajax()){
               if($request->has('searchQuest')){
                $articleall = Article::where('title','like','%'.$request->searchQuest.'%')->get();
                if($request->searchQuest == ""){
                    $articleall = Article::all();
                  }
                if($articleall){
                    foreach($articleall as $key => $article){

                      $articlealls.= '<ul>'.
                      '<li class="bg-slate-100 duration-200 dark:bg-slate-600 dark:text-slate-300 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full">'.'<a href='."article/$article->slug".'>'.$article->title.'</a>'.'</li>'.
                      '</ul>';
    }
    }

       if($articlealls == ""){
          return json_encode($noresult);
       } else {
          return json_encode($articlealls);
       }

    }}
    else {
    $articleall = Article::all();
    }

    return view('home',compact('articleall'));


    }

    public function show($slug ,Request $request){
    $article = Article::with('user')->where('slug',$slug)->firstOrFail();
    $idofarticle = $article->id;
    $articlealls = "";
    $noresult = '<div class="bg-red-500 p-4 rounded-md font-semibold text-white list-none">No Result</div>';
    if($request->ajax()){
        if($request->has('searchQuest')){
            $articleall = Article::where('title','like','%'.$request->searchQuest.'%')->get();
            if($request->searchQuest == ""){
                $articleall = Article::all();
            }
            if($articleall){
                foreach($articleall as $key => $article){
                  $articlealls.= '<ul>'.
                  '<li class="bg-slate-100  dark:bg-slate-600 dark:text-slate-300 duration-200 font-semibold shadow-md hover:bg-blue-500 rounded-md hover:text-white mb-2 p-4 w-full">'.'<a href='."/article/$article->slug".'>'.$article->title.'</a>'.'</li>'.
                  '</ul>';
            }

         }
         if($articlealls == ""){
            return json_encode($noresult);
         } else {
            return json_encode($articlealls);
         }

     }
  }
    // if($article->article_role == "Private" && Auth::user()->role == "moderator"){
    //     return view('detail',compact('article'));

    // } else {
    //       return redirect()->back();
    // }

     if($article){
        if($article->article_type_id == 2){
            if(!Auth::user() || Auth::user()->role != "moderator"){
                return redirect('/');
            } else {
                return view('detail',compact('article'));
            }
        } else {
            return view('detail',compact('article'));
        }
    }





    }





}
