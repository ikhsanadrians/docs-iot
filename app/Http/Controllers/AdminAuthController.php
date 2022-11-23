<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\Article;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
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
         $remember_me = $request->has('remember') ? true : false;

         if(Auth::attempt($credentials,$remember_me)) {
            return redirect()->intended('dashboard')->with('success','Berhasil Login');
         } else {
            return redirect('/login');
         }
    }


    public function dashboard(){
        $article = Article::all();
        if(!Auth::check() || Auth::user()->user_roles_id != 1){
            return redirect('loginadmin')->withErrors(['msg' => 'User Atau Password Salah']);
        } else if (Auth::user()->user_roles_id == 1) {
        return view('Auth.dashboard',compact('article'));
        }
    }

    public function statistic(){
        if(!Auth::user() || Auth::user()->user_roles_id != 1){
            return redirect('/404');
        } else {
            return view('tools.stastic');
        }

    }


    public function setting(){
        if(!Auth::user() || Auth::user()->user_roles_id != 1){
            return redirect('/404');
        } else {
            $user = User::where('user_roles_id',1)->with('article')->get();
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
        "user_roles_id" =>  1,
        "email" => $request->Email,
        "password" => bcrypt($request->password),
     ]);

     Alert::success('Admin Baru Terbuat');


     return redirect('dashboard/admin')->withError('["email" => "Email Are Used"]');


    }

   public function admindetails(Request $request,$slug){
    if(!Auth::user() || Auth::user()->user_roles_id != 1){
        return redirect('/404');
    } else {
        $user = User::with('userroles')->where('slug',$slug)->firstOrFail();
        $userroles = UserRole::all();
        if($request->ajax()){
            if($request->has('valueselect')){
                 $user->update([
                    "user_roles_id" => $request->valueselect
                 ]);
            }
       }
        return view('tools.admindetail',compact('user','userroles'));
    }

   }


   public function imageuploaderview(){
      $images = Image::all();
      return view('tools.imageuploader',compact('images'));
   }

   public function imageuploader(Request $request){


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
         "slug" => Str::slug($title,'-'),
         "icon" => "<img src='/storage/iconcategory/$iconname'>"
        ]);
        return redirect()->back();
        Alert::success("Sukses Menambahkan Gambar");
   } else {
     Category::create([
        "name" => $title,
        "slug" => Str::slug($title,'-'),
        "icon" => $urlicons,
       ]);

       return redirect()->back();
       Alert::success("Sukses Menambahkan Gambar");
   }

}

  public function usersettingindex(){
     $defaultuser = User::where('user_roles_id',2)->orWhere('user_roles_id',3)->get();
     return view('tools.usersetting',compact('defaultuser'));
   }

   public function userdetails(Request $request,$slug){
    $defuser = User::with('userroles')->where('slug',$slug)->firstOrFail();
    $userroles = UserRole::all();
    if($request->ajax()){
        if($request->has('valueselect')){
             $defuser->update([
                "user_roles_id" => $request->valueselect
             ]);
        }
   }
    return view('tools.userdetails',compact('defuser','userroles'));
   }



   public function adminUpdatePicture(Request $request,$slug){
    $user = User::where("slug",$slug);
    if($request->hasFile('imagepicture')){
     $image = $request->imagepicture;
     $getName = $image->getClientOriginalName();
     $image->storeAs('userprofile',$getName);
     $user->update([
       "user_profile" => $getName
     ]);
   }
   if($request->has('updatename')){
    $user->update([
        "name" => $request->updatename,

    ]);
   }
   return redirect()->back();
}



   public function imagedestroy($id){
    $imgtodelete = Image::findOrFail(decrypt($id));
    $imgpath = $imgtodelete->url;
    if(!unlink(storage_path('app/public/image/'.$imgpath))){
        $imgtodelete->delete();
    } else {
        $imgtodelete->delete();
        Storage::delete($imgpath);
    }
    return redirect()->back();
  }

    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

}
