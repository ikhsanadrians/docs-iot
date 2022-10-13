<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        if(!Auth::user()){
            return redirect('/login');
        } else {
            return view('tools.addarticle');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'imagesthumbnail' => 'image|file|max:5024',
            'title' => 'required|min:5',
            'editor' => 'required|min:20',
          ]);


        $userid = Auth::user()->id;
        $title = $validatedData->title;
        $editorcontent = $validatedData->editor;
        $filename = $validatedData->imagesthumbnail->getClientOriginalName();
        $request->imagesthumbnail->storeAs('thumbnailpictures',$filename);

        Article::create([
            "user_id" => $userid,
            "title" => $title,
            "images" => $filename,
            "slug" => Str::slug($title,'-'),
            "description" => $editorcontent,
        ]);


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
      $editarticle = Article::findOrFail(decrypt($id));


        return view('tools.editarticle',compact('editarticle'));

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
        $description = $request->editor;

         Article::findOrFail($decrypted_id)->update([
                "title" => $title,
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

        Article::where('id',decrypt($id))->delete();
        return redirect('/dashboard');

    }
}
