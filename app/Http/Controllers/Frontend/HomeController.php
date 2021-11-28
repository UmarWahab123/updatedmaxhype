<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Packages\Packages;
use App\Models\User;
use App\Models\Setting\Settings;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{ 
 public function home(){
   $user = Auth::user();
   // dd($user);
   $data['packages'] = Packages::get();
   $data['business'] = User::where('role_id',3)->take(6)->get();
   $data['affiliates'] = User::where('role_id',4)->get();
   return view('frontend.home.index',compact('data'));
 }

}
?>