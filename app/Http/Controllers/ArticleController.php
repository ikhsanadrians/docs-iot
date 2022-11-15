<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user() || Auth::user()->user_roles_id != 1){
            return redirect('/404');
        } else {
            $category = Category::all();
            $articletype = ArticleType::all();
            return view('tools.addarticle',compact('category','articletype'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8024',
          ]);

          if($request->hasFile('image')){
              $images = $request->file('image');
              $filename = $images->getClientOriginalName();
              $request->image->storeAs('thumbnail',$filename);

              $categoryall = [];
              $category = $request->category;


          $title = $request->title;
          $userid = Auth::user()->id;




        $article = Article::create([
            "user_id" => $userid,
            "title" =>  $title,
            "article_type_id" => $request->typepost,
            "images" => $filename,
            "slug" => Str::slug($title,'-'),
            "description" => $request->editor,
        ]);
           $article->categories()->attach($request->category);

        Alert::success('Artikel Terbuat');
    }

        return redirect('/dashboard');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article , $id)
    {
      $articletype = ArticleType::all();
      $category = Category::all();
      $editarticle = Article::findOrFail(decrypt($id));


        return view('tools.editarticle',compact('editarticle','category' , 'articletype'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $decrypted_id = decrypt($id);
        $title = $request->title;
        // $category = $request->category;
        $description = $request->editor;

         Article::findOrFail($decrypted_id)->update([
                "title" => $title,
                // "category_id" => $category,
                "slug" => str::slug($title,'-'),
                "description" => $description,

        ]);

        Alert::success('Artikel Terupdate');

        return redirect('/dashboard');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
    */
    public function destroy(Article $article, $id)
    {
           $articleToDelete = Article::findOrFail(decrypt($id));
            $articleImagePath = $articleToDelete->images;
            if(!unlink(storage_path('app/public/thumbnail/'.$articleImagePath))){
                $articleToDelete->delete();
            } else {
                $articleToDelete->delete();
                Storage::delete($articleToDelete->images);
            }

          return redirect()->back();

    }








}
