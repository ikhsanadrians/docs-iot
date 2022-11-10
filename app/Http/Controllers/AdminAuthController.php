<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\Article;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        if(!Auth::check() || Auth::user()->role != "moderator"){
            return redirect('/login')->withErrors(['msg' => 'User Atau Password Salah']);
        } else if (Auth::user()->role == "moderator") {
        return view('Auth.dashboard',compact('article'));
        }
    }

    public function statistic(){
        if(!Auth::user() || Auth::user()->role != "moderator"){
            return redirect('/404');
        } else {
            return view('tools.stastic');
        }

    }


    public function setting(){
        if(!Auth::user() || Auth::user()->role != "moderator"){
            return redirect('/404');
        } else {
            $user = User::where('role','moderator')->with('article')->get();
            return view('tools.adminsetting', compact('user'));
        }

    }

    public function createnewadmin(Request $request){

    $request->validate([
    "user" => "required",
    "Email" => "required | unique:users,email,",
    "profilepic" => "image|mimes:jpg,jpeg,png,gif|max:3048",
    "password" => "required"

    ]);

    if($request->hasFile('profilepic')){
        $images = $request->file('profilepic');
        $filename =$images->getClientOriginalName();
        $images->storeAs('userprofile',$filename);

       }


     User::create([
        "name" => $request->user,
        "user_profile" => $filename,
        "slug" => Str::slug($request->user),
        "role" => "moderator",
        "email" => $request->Email,
        "password" => bcrypt($request->password),
     ]);

     Alert::success('Admin Baru Terbuat');


     return redirect('dashboard/admin')->withError('["email" => "Email Are Used"]');


    }

   public function admindetails($slug){
    if(!Auth::user() || Auth::user()->role != "moderator"){
        return redirect('/404');
    } else {
        $user = User::where('slug',$slug)->firstOrFail();
        return view('tools.admindetail',compact('user'));
    }

   }


   public function imageuploaderview(){
      $images = Image::all();
      return view('tools.imageuploader',compact('images'));
   }

   public function imageuploader(Request $request){
//    dd($request->all());


$validated = $request->validate([
    'title' => 'required',
    'images' => 'required|image|mimes:jpg,jpeg,png,gif|max:3048',
]);

   if($request->hasFile('images')){
    $images = $request->file('images');
    $filename =$images->getClientOriginalName();
    $images->storeAs('image',$filename);
    $imageSize = $images->getSize();
    $fil = number_format($imageSize / 1048576,2);
   }

    $title = $request->title;

    Image::create([
        "title" => $request->title,
        "url" => $filename,
        "size" => $fil,
    ]);

    return redirect()->back();

    Alert::success('Sukses Menambahkan Gambar');

}

public function addcategoryindex(){
    $categories = Category::all();
    return view('tools.addcategory',compact('categories'));
}


public function addcategory(Request $request){
   $title = $request->titlecategory;
   $urlicons = $request->urlicon;

   if($request->hasFile('icon')){
       $icons = $request->file('icon');
       $iconname = $icons->getClientOriginalName();
       $icons->storeAs('iconcategory',$iconname);
       Category::create([
         "name" => $title,
         "icon" => "<img src='/storage/iconcategory/$iconname'>"
        ]);
        return redirect()->back();
        Alert::success("Sukses Menambahkan Gambar");
   } else {
     Category::create([
        "name" => $title,
        "icon" => $urlicons,
       ]);

       return redirect()->back();
       Alert::success("Sukses Menambahkan Gambar");
   }

}

  public function usersettingindex(){
     return view('tools.usersetting');
   }




    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}