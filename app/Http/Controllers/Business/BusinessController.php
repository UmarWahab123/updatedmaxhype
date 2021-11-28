<?php
namespace App\Http\Controllers\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\User;
use App\Models\Bookings\Booking;
use App\Models\Locations\Countries;
use App\Models\Video;
use App\Http\Requests;
use App\Models\Reservations\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class BusinessController extends Controller
{	
    public function business()
    {
        $data['page_title'] = "All Businesses";
        $data['results'] = User::where('role_id',3)->get();
        return view('business.view', compact('data'));
    }
    public function businesses($id = -1)
    {
        $data['page_title'] = "Add Business Details";
        $data['country'] = Countries::get();
        $data['affiliate'] = User::where('role_id',4)->get();
        if ($id != -1) {
            $data['page_title'] = "Update Business Details";
            $data['results'] = User::where('id', $id)->first();
        // dd(json_decode($data['results']->images));

        }
        return view('business.save', compact('data'));
    }
    public function savebusiness(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
        $data['images']=set_multi_uploads($data['old_images'],$data['images']);
        unset($data['old_images']);
        // dd($data['images']);

        $action = "Added";
        if ($id) {
            $action = "Updated";
            $affected_rows = User::find($id)->update($data);
        } else {
            $affected_rows = User::create($data);
        }
        $message= set_message($affected_rows,'Business',$action);
        Session::put('message', $message);
        return Redirect('admin/business');
    }

    public function deletebusiness($id)
    {
        $affected_rows = User::find($id)->delete();
        $message=   set_message($affected_rows,'Business','Deleted');
        Session::put('message', $message);
        return Redirect('admin/business');
    }
    public function booking()
    {
        $data['page_title'] = "All Bookings";
        $data['results'] = Booking::get();
        return view('bookings.view', compact('data'));
    }
    public function bookingsdetails($id){
        $data['page_title'] = "Booking Details";
        $data['results'] = Booking::where('id',$id)->first();
        // dd($data['results']);
        return view('bookings.details',compact('data'));
    }
    //Business Request
    public function accepted()
    {
        $data['page_title'] = "Accepted Request ";
        $data['results'] = User::where('status','Accepted')->get();
        return view('business.accepted', compact('data'));
    }
    public function rejected()
    {
        $data['page_title'] = "Rejected Request ";
        $data['results'] = User::where('status','Rejected')->get();
        return view('business.rejected', compact('data'));
    }
    public function pending()
    {
        $data['page_title'] = "Pending Request ";
        $data['results'] = User::where('status','Pending')->get();
        return view('business.pending', compact('data'));
    }
    public function businessdetails($id){
        $data['page_title'] = "Business Details";
        $data['results'] = User::where('id',$id)->first();
        $data['videos']=Video::where('users_id',$id)->get();
        $data['reservation'] = Reservation::where('business_id',$id)->where('type','Reservation')->get();
        $data['purchase'] = Reservation::where('business_id',$id)->where('type','Purchase')->get();
        return view('business.details',compact('data'));
    }
    //Business Owner
    public function business_owners()
    {
        $data['page_title'] = "Business Owners";
        $data['results'] = User::where('role_id',3)->get();
        return view('business.owners', compact('data'));
    }
    public function purchased()
    {
        $data['page_title'] = "All Purchase";
        $data['results'] = Reservation::where('type','Purchase')->get();
        return view('business.purchase', compact('data'));
    }
    public function reserved()
    {
        $data['page_title'] = "All Reservation";
        $data['results'] = Reservation::where('type','Reservation')->get();
        return view('business.reservation', compact('data'));
    }
   public function upload_file(Request $request){
        $path=$_GET['url'];
        $path = str_replace('-', '/', $path);
        if ( !empty( $_FILES ) ) {
            $date = new \DateTime();
            $current_dir=str_replace('uploads','',getcwd());
            $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
            $name=str_replace(' ', '', $_FILES['file']['name']);
            $filename=$date->getTimestamp().'-'. $name;
//            $filename=$name;
            $uploadPath = $current_dir.$path. DIRECTORY_SEPARATOR .$filename;
//            print_r($uploadPath); exit;
            move_uploaded_file( $tempPath, $uploadPath );
            $answer = array( 'answer' => 'File transfer completed' );
            $json = json_encode( $answer );
            $newFileName = $path.'/'.$filename;
            echo $newFileName;
        } else {
            echo 'No files';
        }
    }
     public function deletefiles(Request $request){
        $ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
        $storeFolder = 'uploads';
        $fileList = $_POST['fileList'];
        $path = $_POST['path'];
        $targetPath = getcwd(). $fileList;
         $path = str_replace('/', '/', $path);
         //dd(trim($fileList));
        if(isset($fileList)){
            unlink($targetPath.$fileList);
        }
    }
     public function uploadImage()
        {
         // dd($_FILES);
            // dd('test');
            if (!empty($_FILES)) {
                $date = new \DateTime();

                $current_dir = getcwd();
                $tempPath = $_FILES['file']['tmp_name'];
                $name = str_replace(' ', '', $_FILES['file']['name']);
                $filename = $date->getTimestamp() . '-' . $name;
                $filePath = '\public\uploads\images' . DIRECTORY_SEPARATOR . $filename;
                $savedPath = '/public/uploads/images/' . $filename;
                // $uploadPath = $current_dir . '' . DIRECTORY_SEPARATOR . $date->getTimestamp() . '-' . $name;
                $uploadPath = $current_dir . $filePath;
                // print_r($uploadPath);
                // exit;
                move_uploaded_file($tempPath, $uploadPath);
                echo $savedPath;
            }
        }

        public  function removeimg(Request $request)
        {
            // dd('test');
            $path = $request->path;
            // dd($path);

            $dir_path = getcwd() . '/' . $path;

            unlink($dir_path);
        }
        public function approve_request($id){
           $data['results'] = User::where('id',$id)->update(['status'=>'Accepted']);
           $message = set_message('Your Request','Status','Updated');
           Session::put('message', $message);
           return Redirect('admin/accepted');
        }
        public function reject_request($id){
           $data['results'] = User::where('id',$id)->update(['status'=>'Rejected']);
           $message = set_message('Your Request','Status','Updated');
           Session::put('message', $message);
           return Redirect('admin/rejected');
        }

}

?>
