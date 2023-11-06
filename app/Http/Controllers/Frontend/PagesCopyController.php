<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\User;
use App\Models\Contacts\Contact;
use App\Models\Bookings\Booking;
use App\Models\Locations\Countries;
use App\Models\Locations\Cities;
use App\Models\Memberships\Membership;
use App\Models\Reservations\Reservation;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Video;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Stripe;
class PagesController extends Controller
{
  // public function about(){
  //   $data['packages'] = Membership::get();
  //   return view('frontend.about.about',compact('data'));
  // }
  public function businesses($type){
    $data['type'] =$type; 
    $data['results'] = User::where('type',$type)->get();
    return view('frontend.businesses.index',compact('data'));
  }
  public function business_details($id){
    $data['businesses'] = User::where('role_id',3)->get();
    $data['details'] = User::where('id',$id)->first();
    $data['products'] = Product::where('business_id',$id)->get();
    // dd($data['products']);
    return view('frontend.businesses.details',compact('data'));
  }
  // public function memberships(){
  //   $data['packages'] = Membership::get();
  //   return view('frontend.membership.index',compact('data'));
  // }
  // public function bookings($id){
  //   $user=Auth::user();
  //    // dd($user);
  //   $data['country'] = Countries::get();
  //   $data['details'] = Membership::where('id',$id)->first();
  //   $data['businesses'] = User::where('role_id',3)->get();
  //   return view('frontend.membership.booking',compact('data'));
  // }
  public function reservation($id,$type){
    $data['type'] = $type;
    $data['id'] = $id;
    $data['details'] = Product::where('id',$id)->first();
    // if(Auth::user()->id==)
    // dd($data['details']);
    return view('frontend.businesses.reservation',compact('data'));
  }
  public function save_reservation(Request $request){
    $data =$request->all();
    $data['date'] = db_format_date($request->date);
    $affected_rows = Reservation::create($data);
    $data['business'] = User::where('id',$request->business_id)->first();
    $data['affiliate'] = User::where('id',$data['business']->affiliate_id)->first();
    $email = [Auth::user()->email,$data['business']->email,$data['affiliate']->email];
    $this->send_email_test1($email,'Welcome to Maxhype','frontend.emails.mail',$data);

    $response = array('response' => $affected_rows);
    return json_encode($response);
 }

 //submit a booking form 
  // public function savebookings(Request $request){
  //     $data = $request->all();
  //     $business = $data['business'];
  //     $id=$business['id'];
  //       if(!empty($business['password'])){

  //           $business['password'] = Hash::make($business['password']);

  //       }else{

  //           unset($business['password']);

  //       }
  //     $memberships = $data['booking'];
  //     $action = "Added";
  //       if($id){
  //           $action = "Updated";
  //           $modal = User::find($id);
  //           $affected_rows = $modal->update($business);
  //       }else{
  //        $affected_rows = User::create($business);
  //        $id= $affected_rows->id;
  //       }
  //     $memberships['users_id'] = $id;
  //     $affected_rows = Booking::create($memberships);
  //     $this->send_email_test1($business['personal_email'],'Welcome to Maxhype','frontend.emails.mail',$data);
  //     $response = array('response' =>$affected_rows);
  //       return json_encode($response);
  //   }
   function send_email_test1($email,$subject,$template,$data)
    {
        Mail::send($template, ['data'=>$data], function($message) use ($subject, $email) {
                $message->to($email,$subject)->subject($subject);
                $message->from('asad@igtechservices.com',$subject);
           });
    }
    public function getcity($id)
    {
        $data['cities'] = Cities::where('location_country_id', $id)->get();
        $option = '';
        $option .= '<option value="">Select</option>';  
        foreach($data['cities'] as $value){
        $option .= '<option data-zipcode="'.$value->location_city_zipcode.'" value="'.$value->id.'">'.$value->location_city_name.'</option>';  
    }
      $response = array('response' =>$option);
        return json_encode($response);
   }
   public function dashboard($id,$type='business'){
    $data['results'] = User::where('id',$id)->first();
    $data['videos']=Video::where('users_id',$id)->get();
    $data['reservation'] = Reservation::where('business_id',$id)->where('type','Reservation')->get();
    $data['purchase'] = Reservation::where('business_id',$id)->where('type','Purchase')->get();
    $data['country'] = Countries::get();
    $data['products']=Product::where('business_id', $id)->get();

    // $data['products']=view('frontend.dashboard.partial.products', compact('data'))->render();
    $data['type'] = $type;
    $data['business'] = User::where('role_id',3)->get();


    return view('frontend.dashboard.index',compact('data'));
   }
   public function customer_dashboard($id){
    $data['results'] = User::where('id',$id)->first();
    $data['reservation'] = Reservation::where('business_id',$id)->where('type','Reservation')->get();
    $data['purchase'] = Reservation::where('business_id',$id)->where('type','Purchase')->get();
    $data['country'] = Countries::get();
    // $data['business'] = User::where('role_id',3)->get();
    return view('frontend.dashboard.customer_dashboard',compact('data'));
   }
  public function affiliate_dashboard($id,$type){
    $data['country'] = Countries::get();
    $data['results'] = User::where('id',$id)->first();
    $data['businesses'] = User::where('affiliate_id',$id)->get();
    $data['type']=$type;
    return view('frontend.dashboard.affiliate_dashborad',compact('data'));
   }
  public function reservationmodal($id,$type)
    {
       $data['type'] = $type;
        $data['reservation'] = Reservation::where('business_id', $id)->where('type',$type)->get();
        $modal = view('frontend.dashboard.details',compact('data'))->render();
        $response = array('response' =>$modal);
        return json_encode($response);
    }
  public function saveinfo(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
        $affected_rows = User::find($id)->update($data);
        $data['results'] = User::where('id',$id)->first();
        $modal = view('frontend.dashboard.affiliate-info',compact('data'))->render();
        $response = array('response' =>$modal);
        return json_encode($response);
    }
  public function saveinfo1(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
        $affected_rows = User::find($id)->update($data);
        $data['results'] = User::where('id',$id)->first();
        $modal = view('frontend.dashboard.customer-info',compact('data'))->render();
        $response = array('response' =>$modal);
        return json_encode($response);
    }
  public function saveinfo2(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
        $affected_rows = User::find($id)->update($data);
        $data['results'] = User::where('id',$id)->first();
        $modal = view('frontend.dashboard.business-info',compact('data'))->render();
        $response = array('response' =>$modal);
        return json_encode($response);
    }
    public function savebusiness(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
         if(!empty($data['password'])){

            $data['password'] = Hash::make($data['password']);

        }else{

            unset($data['password']);

        }
        $affected_rows = User::create($data);
        $response = array('response' =>$affected_rows);
        return json_encode($response);
    }
  public function videomodal(Request $request)
     {
        $data['users_id'] = $request->users_id;
        $data['results'] = Video::where('id', $request->id)->first();
        $data['business'] = User::where('role_id',3)->get();
        $modal = view('frontend.dashboard.save', compact('data'))->render();
        $response = array('response' => $modal);
        return json_encode($response);

    }
     public function productmodal(Request $request)
     {   
        $data['users_id'] = $request->users_id;
         $data['results'] = Product::where('id',$request->id)->first();
        // $data['business'] = User::where('role_id',3)->get();
        $modal = view('frontend.dashboard.partial.product_form', compact('data'))->render();
        $response = array('response'=>$modal);
        return json_encode($response);

    }
    public function saveproduct(Request $request,$type='business')
    {
        $id = $request->id;
        $data = $request->all();
        if(!isset($data['tickets_available'])){
            $data['tickets_available']=0;
        }
        $action = "Added";
        if ($id){
            $action = "Updated";
            $modal = Product::find($id);
            $affected_rows = $modal->update($data);
        } else {
            $affected_rows = Product::create($data);
        }
        $data['type']=$type;
        $data['products'] = Product::where('business_id', $request->business_id)->get();
        $response = view('frontend.dashboard.partial.products', compact('data'))->render();
        $response = array('response' => $response);
        return json_encode($response);
    }
    public function deleteproduct($id,$user_id,$type='business')
    {
        $affected_rows = Product::find($id)->delete();
        $data['type']=$type;
        $data['products'] = Product::where('business_id', $user_id)->get();
        $response = view('frontend.dashboard.partial.products', compact('data'))->render();
        $response = array('response' => $response);
        return json_encode($response);
    }
    public function savelogo(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $image=$request->dp;
        $action = "Added";
        $affected_rows = User::where('id', $id)->update($data);
        $image=url($image);
        $response = array('response' => $image);
        return json_encode($response);

    }
    public function saveprofile(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $image=$request->dp;
        $action = "Added";
        $affected_rows = User::where('id', $id)->update($data);
        $image=url($image);
        $response = array('response' => $image);
        return json_encode($response);

    }
  public function saveimages(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $data['images']=set_multi_uploads($data['old_images'],$data['images']);
        unset($data['old_images']);
        $action = "Added";
        $affected_rows = User::where('id', $id)->update($data);

        $data['results'] = User::where('id', $id)->first();
        $response = view('frontend.dashboard.all_images', compact('data'))->render();
        // dd($response);
        $response = array('response' => $response);
        return json_encode($response);
    }
   public function savevideos(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = Video::find($id);
            $affected_rows = $modal->update($data);
        } else {
            $affected_rows = Video::create($data);

        }
        $data['videos'] = Video::where('users_id', $request->users_id)->get();
        $data['type'] = 'business';
        $response = view('frontend.dashboard.all_videos', compact('data'))->render();

        $response = array('response' => $response);
        return json_encode($response);
    }
    public function deletevideo($id)
    {
        $affected_rows = Video::find($id)->delete();
        $response = array('response' => $affected_rows);
        return json_encode($response);
    }
    public function getcities($id)
    {
        $data['cities'] = Cities::where('location_country_id', $id)->get();
        $option = '';
        $option .= '<option value="">Select</option>';  
        foreach($data['cities'] as $value){
        $option .= '<option data-zipcode="'.$value->location_city_zipcode.'" value="'.$value->id.'">'.$value->location_city_name.'</option>';  
    }
      $response = array('response' =>$option);
        return json_encode($response);
}
    public function dropzone(){
      return view('frontend.dashboard.dropzone');
    }
    public function uploadfile(Request $request)
    {
  // print_r('expression');exit();
        $path=$_GET['url'];
        $path = str_replace('-', '/', $path);
  // print_r($path);exit();

        if ( !empty( $_FILES ) ) {
            $date = new \DateTime();

            $current_dir=str_replace('uploads','',getcwd());
            $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
            $name=str_replace(' ', '', $_FILES['file']['name']);
            $uploadPath = $current_dir.$path. DIRECTORY_SEPARATOR .$date->getTimestamp().'-'. $name;
           // print_r($uploadPath); exit;
            move_uploaded_file( $tempPath, $uploadPath );

            $answer = array( 'answer' => 'File transfer completed' );
            $json = json_encode( $answer );
            $newFileName = $date->getTimestamp().'-'. $name;
//    echo $json;
            echo $newFileName;
        } else {
            echo 'No files';
        }
    }
    public function paymentintent(Request $request)
     {
       $amount=$request->price;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $intent=Stripe\PaymentIntent::create([
                "amount" => $amount * 100,
                "currency" => "USD",
                
        ]);

        // Session::flash('success', 'Payment successful!');
           
        return $intent->client_secret;
    }
    // public function bookingintent(Request $request)
    //  {
    //    $amount=$request['booking']['total_price'];
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     $intent=Stripe\PaymentIntent::create([
    //             "amount" => $amount * 100,
    //             "currency" => "USD",
                
    //     ]);

    //     // Session::flash('success', 'Payment successful!');
           
    //     return $intent->client_secret;
    // }
    public function search(){
     $search=$_GET['search'];
     $data['business'] = User::where('role_id',3)->where('first_name', 'LIKE', '%' .$search. '%')->get();
     $data['location'] = Countries::where('location_country_name', 'LIKE', '%' .$search. '%')->get();
     $data['tickets'] = Reservation::where('reservation_number', 'LIKE', '%' .$search. '%')->get();
     $response = view('frontend.dashboard.search', compact('data'))->render();
     $response = array('response' => $response);
     return json_encode($response);
    }
}
?>