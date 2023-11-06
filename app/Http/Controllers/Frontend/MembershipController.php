<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;

use App\Models\User;

use App\Models\Bookings\Booking;

use App\Models\Locations\Countries;
use App\Models\Locations\Cities;


use App\Models\Memberships\Membership;

use App\Http\Requests;

use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

use Stripe;

class MembershipController extends Controller

{

  public function memberships(){

    $data['packages'] = Membership::get();
      // dd(url()->previous());
 
    return view('frontend.membership.index',compact('data'));

  }

  public function bookings($id){

    $user=Auth::user();
     // dd($user);
    $data['country'] = Countries::get();
    
    $data['details'] = Membership::where('id',$id)->first();

    $data['price'] = $data['details']['price'];

    $data['price'] = str_replace("$","",$data['price']);

    $data['businesses'] = User::where('role_id',3)->get();
    if(!empty(Auth::user())){
    $data['cities'] = Cities::where('location_country_id',Auth::user()->country)->get();
    }
    return view('frontend.membership.booking',compact('data'));

  }

 //submit a booking form 

  public function savebookings(Request $request){
      $data = $request->all();
      $country=$data['business']['country'];
      $zip_code=$data['business']['postal_code'];
      $other_city=$data['other_city'];
      if(!empty($other_city))
      {
      $cities=['location_city_name'=>$other_city,'location_city_zipcode'=>$zip_code,'location_country_id'=>$country];
        $affected_rows = Cities::create($cities);
        $city_id = $affected_rows->id;
        $data['business']['city']=$city_id;
      }
      unset($data['other_city']);
      $business = $data['business'];
      $id=$business['id'];
        if(!empty($business['password'])){
            $business['password'] = Hash::make($business['password']);
        }else{
            unset($business['password']);
        }
      $memberships = $data['booking'];
      $action = "Added";
        if($id){
            $action = "Updated";
            $modal = User::find($id);
            $affected_rows = $modal->update($business);
        }else{
         $affected_rows = User::create($business);
         $id= $affected_rows->id;
        }
      $memberships['users_id'] = $id;
      $affected_rows = Booking::create($memberships);
     $type3="Booking";
      $this->send_email_test1($business['personal_email'],'Welcome to Maxhype','frontend.emails.bookings_mail',$data);
       $redirect_url=url('/process-transaction').'/'.$affected_rows->id.'/'.$type3;
      $response = array('response' =>$affected_rows,'redirect_url'=> $redirect_url);
        return json_encode($response);
    }

   function send_email_test1($email,$subject,$template,$data)

    {

        Mail::send($template, ['data'=>$data], function($message) use ($subject, $email) {

                $message->to($email,$subject)->subject($subject);

                $message->from('asad@igtechservices.com',$subject);

           });

    }

    public function bookingintent(Request $request)

     {

       $amount=$request['booking']['total_price'];
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent=Stripe\PaymentIntent::create([

                "amount" => $amount * 100,

                "currency" => "USD",

                

        ]);



        // Session::flash('success', 'Payment successful!');

           

        return $intent->client_secret;

    }

}

?>