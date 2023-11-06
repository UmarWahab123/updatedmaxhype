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
        // dd($data['cities']);
        $option = '';
        $option .= '<option value="">Select</option>';  

        foreach($data['cities'] as $value){
        $option .= '<option data-zipcode="'.$value->location_city_zipcode.'" value="'.$value->id.'">'.$value->location_city_name.'</option>';  
    }
        $option .= '<option class="others">Other</option>';  
      $response = array('response' => $option);
        return json_encode($response);
   }
   public function dashboard($id,$type='business'){
    $data['results'] = User::where('id',$id)->first();
    $data['videos']=Video::where('users_id',$id)->get();
    $data['reservation'] = Reservation::where('business_id',$id)->where('type','Reservation')->get();
    $data['purchase'] = Reservation::where('business_id',$id)->where('type','Purchase')->get();
    $data['country'] = Countries::get();
    // $data['cities'] = Cities::where('location_country_id',Auth::user()->country)->get();
    $data['products']=Product::where('business_id', $id)->get();

    // $data['products']=view('frontend.dashboard.partial.products', compact('data'))->render();
    $data['type'] = $type;
    $data['business'] = User::where('role_id',3)->get();


    return view('frontend.dashboard.index',compact('data'));
   }
   public function customer_dashboard($id){
    $data['results'] = User::where('id',$id)->first();
    $data['reservation'] = Reservation::where('customer_id',$id)->where('type','Reservation')->get();
    // dd($data['reservation']);
    $data['purchase'] = Reservation::where('customer_id',$id)->where('type','Purchase')->get();
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
        $country=$data['country'];
        $zip_code=$data['postal_code'];
        $other_city=$data['other_city'];
        if(!empty($other_city))
        {
        $cities=['location_city_name'=>$other_city,'location_city_zipcode'=>$zip_code,'location_country_id'=>$country];
        $affected_rows = Cities::create($cities);
        $city_id = $affected_rows->id;
        $data['city']=$city_id;
        }
        unset($data['other_city']);
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
    $option .= '<option class="others">Other</option>';  
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
}
?>