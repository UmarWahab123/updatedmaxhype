<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;

use App\Models\Packages\Packages;

use App\Models\Slider\Slider;

use App\Models\Locations\Countries;

use App\Models\Locations\Cities;

use App\Models\Careers\Careers;

use App\Models\Applicants\Applicant;

use App\Models\Product\Product;

use App\Models\User;

use App\Models\Setting\Settings;

use App\Http\Requests;

use App\Models\Memberships\Membership;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

use DB;

class HomeController extends Controller

{ 

  public function home()
  {
      $user = Auth::user();

      $data['slider'] = Slider::get()->take(8);
      
      $data['affiliates'] = User::where('role_id',4)->get();

      return view('frontend.home.index',compact('data'));
  }
  public function get_product()
    {
       $data['product'] = Product::get();
        $modal = view('frontend.home.product',compact('data'))->render();
        $response = array('response' =>$modal);
        return json_encode($response);
  }
 public function get_home_section()
    {
     $data['business'] = User::where('role_id',3)->take(6)->get();
      $data['countries']= DB::table('users')->join('location_countries', 'users.country', '=', 'location_countries.id')->groupBy('location_countries.id')->get();
        $modal = view('frontend.home.destinations',compact('data'))->render();
        $response = array('response' =>$modal);
        return json_encode($response);
    }
  public function business_listing($id)
  {
      $data['page_title'] = "Business Listing";
      $data['results'] = User::where('country',$id)->get();
      return view('frontend.businesses.business_listing',compact('data'));
  }
  public function business_city($id)
  {
      $data['page_title'] = "Business Cities";
      $data['results'] = Cities::where('location_country_id',$id)->get();
      return view('frontend.businesses.business_city',compact('data'));
  }
  public function business_city_detail($id)
  {
      $data['page_title'] = "Business Listing";
      $data['results'] = User::where('city',$id)->get();
      return view('frontend.businesses.business_city_listing',compact('data'));
  }
  //Footer links functions
  public function about(){
    $data['packages'] = Membership::get();
    return view('frontend.about.about',compact('data'));
  }
  public function privacypolicy()
  {
   
    return view('frontend.privacypolicy.privacypolicy');
  }
  public function terms()
  {
    return view('frontend.terms.terms');
  }
  public function testimonials()
  {
    return view('frontend.testimonials.testimonial');
  }

}

?>