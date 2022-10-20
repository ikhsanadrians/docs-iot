<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\Article;
use App\Models\User;
use Session;
use Illuminate\Support\Str;
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

    public function statistic(){
        if(!Auth::user()){
            return redirect('/login');
        } else {
            return view('tools.stastic');
        }

    }


    public function setting(){
        if(!Auth::user()){
            return redirect('/login');
        } else {
            $user = User::with('article')->get();
            return view('tools.adminsetting', compact('user'));
        }

    }

    public function createnewadmin(Request $request){

    $request->validate([
    "user" => "required",
    "Email" => "required | unique:users,email,",
    "password" => "required"
    ]);

     User::create([
        "name" => $request->user,
        "slug" => Str::slug($request->user),
        "email" => $request->Email,
        "password" => bcrypt($request->password),
     ]);

     Alert::success('Admin Baru Terbuat');


     return redirect('dashboard/admin')->withError('["email" => "Email Are Used"]');


    }

   public function admindetails($slug){
    if(!Auth::user()){
        return redirect('/login');
    } else {
        $user = User::where('slug',$slug)->firstOrFail();
        return view('tools.admindetail',compact('user'));
    }

   }


   public function imageuploaderview(){
      return view('tools.imageuploader');
   }








    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}