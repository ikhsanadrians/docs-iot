<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
class UserAuthController extends Controller
{
    public function index(){
        return view('Auth.userlogin');
    }

    public function auth(Request $request){
        $request->validate([
           'email' => 'required',
           'password' => 'required',
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
           return redirect()->intended('/')->with('success','Berhasil Login');
        } else {
           return redirect('/login');
        }
   }


   public function registerindex(){

     return view('Auth.userregister');

   }

   public function register(Request $request){
     User::create([
          "name" => $request->username,
          "slug" => Str::slug($request->username),
          "role" => "default_user",
          "email" => $request->email,
          "password" => bcrypt($request->password),

     ]);

    return redirect('/');
   }
}