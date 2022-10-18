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


          $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5024',
          ]);

          if($request->hasFile('image')){
              $images = $request->file('image');
              $filename = $images->getClientOriginalName();
              $request->image->storeAs('thumbnail',$filename);


          $title = $request->title;
          $userid = Auth::user()->id;

        Article::create([
            "user_id" => $userid,
            "title" =>  $title,
            "images" => $filename,
            "slug" => Str::slug($title,'-'),
            "description" => $request->editor,
        ]);

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




    public function search(Request $request){

         if($request->ajax()){
            $output = '';
            $query = $request->get('search');
            $articles = Article::where('title','LIKE','%'.$query.'%')->get();

         if($articles){
            foreach($articles as $article){

                $output = $article->title;


            }
            return response()->json($output);
        }

        }
        return view('tools.search');
    }

}
