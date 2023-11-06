<?php
namespace App\Http\Controllers\Api;
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
class BookingController extends Controller
{
  public function businesses($type){
    $data['results'] = User::where('type',$type)->get()->toArray();
    $response = array('businesses'=>$data['results']);
    return json_encode($response);
  }
  public function business_details($id){
    $data['details'] = User::where('id',$id)->first()->toArray();
    $data['products'] = Product::where('business_id',$id)->get()->toArray();
    $response = array('status'=>1,'details'=>$data['details'],'products'=>$data['products']);
    return json_encode($response);
  }
  public function products($id){
    $data['products'] = Product::where('business_id',$id)->get()->toArray();
    $response = array('products'=>$data['products']);
    return json_encode($response);
  }
  public function reservations($id,$type,$type2){
    $data['business_type'] = $type2;
    $data['type'] = $type;
    $data['id'] = $id;
    $data['reservation'] = Product::where('id',$id)->first();
    $response = array('status'=>1,'reservation'=>$data['reservation']);
    return json_encode($response);
  }
  public function save_reservation(Request $request){
   $data = $request->all();
    $random = hexdec(uniqid()); 
    $data['order_number']=substr($random, 0, 8);
    $data['date'] = db_format_date_slash($request->date);
    $data['qr_code'] = QrCode::size(100)->generate(json_encode($data));
    $affected_rows = Reservation::create($data);
    $data['business'] = User::where('id',$request->business_id)->first();
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
    $data['customer'] = User::where('id',$request->customer_id)->first();
    $to_email = $data['customer']->email;
    // dd($data);
    $this->send_email_test1($to_email,$ccemail,'Welcome to Maxhype','frontend.emails.mail',$data);
    $response = array('status'=>1,'response'=>$affected_rows);
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
  }
?>