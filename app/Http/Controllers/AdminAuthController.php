<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\Article;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function index(){
        return view('Auth.login');
    }

    public function auth(Request $request){
         $request->validate([
            'email' => 'required',
            'password' => 'required',
         ]);
         $credentials = $request->only('email','password');
         if(Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success','Berhasil Login');
         } else {
            return redirect('/login');
         }
    }


    public function dashboard(){
        $article = Article::all();
        if(!Auth::check()){
            return redirect('/login')->withErrors(['msg' => 'The Message']);
        } else {
        return view('Auth.dashboard',compact('article'));
        }
    }



    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
