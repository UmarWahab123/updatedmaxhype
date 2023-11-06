<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;

use App\Models\User;

use App\Models\Locations\Countries;
use App\Models\Locations\Cities;


use App\Models\Reservations\Reservation;

use App\Http\Requests;

use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;

use App\Models\Product\Product;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

use Stripe;

use QrCode;


class BookingsController extends Controller

{

  public function businesses($type){

    $data['type'] =$type; 

    $data['results'] = User::where('type',$type)->paginate(6);

    // dd($data);

    return view('frontend.businesses.index',compact('data'));

  }

  public function business_details($id){

    $data['businesses'] = User::where('role_id',3)->get();

    $data['details'] = User::where('id',$id)->first();
    $data['type'] = $data['details']['feature']; 
    
    $data['products'] = Product::where('business_id',$id)->get();

    return view('frontend.businesses.details',compact('data'));

  }

  public function reservation($id,$type,$type2){
    $data['business_type'] = $type2;
    $data['type'] = $type;
    $data['id'] = $id;
    $data['details'] = Product::where('id',$id)->first();
    $data['price'] = $data['details']['price'];
    $data['price'] = str_replace("$","",$data['price']);
    $data['fee'] = $data['details']['fee'];
    $data['fee'] = str_replace("$","",$data['fee']);
    $data['total_tickets']=$data['details']->total_tickets;
    return view('frontend.businesses.reservation',compact('data'));
  }
  public function save_reservation(Request $request){
    $data = $request->all();
    $random = hexdec(uniqid()); 
    $data['order_number']=substr($random, 0, 8);
    $data['date'] = db_format_date_slash($request->date);
    $data['qr_code'] = QrCode::size(100)->generate(json_encode($data));
    $affected_rows = Reservation::create($data);
    $data['business'] = User::where('id',$request->business_id)->first();
    $data['business_address'] = $data['business']->address;
    $data['cities'] = Cities::where('id',$data['business']['city'])->first();
    $data['country'] =Countries::where('id',$data['business']['country'])->first();
    $business_email=$data['business']['email'];
    if(!empty($data['business']->affiliate_id)){
    $data['affiliate'] = User::where('id',$data['business']->affiliate_id)->first();
    $affiliate_email=$data['affiliate']['email'];
      if(!empty($affiliate_email)){
      $ccemail = [$business_email,$affiliate_email,"admin@themaxhype.com"];
      }

    }else{
    $ccemail = [$business_email,"admin@themaxhype.com"];
   }
   $to_email = Auth::user()->email;
   $type3="Purchase";
    $this->send_email_test1($to_email,$ccemail,'Welcome to Maxhype','frontend.emails.mail',$data);
    $redirect_url=url('/process-transaction').'/'.$affected_rows->id.'/'.$type3;

    $response = array('response' => $affected_rows,'redirect_url'=> $redirect_url);

    return json_encode($response);

 }

   function send_email_test1($to_email,$ccemail,$subject,$template,$data)

    {

        Mail::send($template, ['data'=>$data], function($message) use ($subject, $to_email,$ccemail) {

                  $message->to($to_email,$subject)->subject($subject)
                  ->bcc($ccemail,$subject)->subject($subject);
                  $message->from('support@themaxhype.com',$subject);

           });

    }

    public function paymentintent(Request $request)

     {

       $amount=$request->total_price;

       Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent=Stripe\PaymentIntent::create([

                "amount" => $amount * 100,

                "currency" => "USD",
        ]);

        // Session::flash('success', 'Payment successful!');

        return $intent->client_secret;

    }

    public function search(){

     $search=$_GET['search'];

     $data['business'] = User::where('role_id',3)->where('first_name', 'LIKE', '%' .$search. '%')->get();

     $data['location'] = Countries::where('location_country_name', 'LIKE', '%' .$search. '%')->get();

     $data['tickets'] = Reservation::where('reservation_number', 'LIKE', '%' .$search. '%')->get();

     $response = view('frontend.dashboard.search', compact('data'))->render();

     $response = array('response' => $response);

     return json_encode($response);

    }

    public function products_details($id){

    $data['products'] = Product::where('id',$id)->first();

    $details =$data['products']['description'];


    $response = array('response' =>$details);

     return json_encode($response); 

    }


}

?>