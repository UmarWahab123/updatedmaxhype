<?php
namespace App\Http\Controllers\Affiliate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class AffiliateController extends Controller
{	
    public function affiliate()
    {
        $data['page_title'] = "Affiliates";
        $data['results'] = User::where('role_id',4)->get();
        return view('affiliate.view', compact('data'));
    }
    public function affiliates($id = -1)
    {
        $data['page_title'] = "Add Affiliate";
        if ($id != -1) {
            $data['page_title'] = "Update Affiliate";
            $data['results'] = User::where('id', $id)->first();
        }
        return view('affiliate.save', compact('data'));
    }
    public function saveAffiliate(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
        $data['referral_code'] = uniqid();  
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $affected_rows = User::find($id)->update($data);
        } else {
            $affected_rows = User::create($data);
        }
        $message= set_message($affected_rows,'Affiliate',$action);
        Session::put('message', $message);
        return Redirect('admin/affiliate');
    }

    public function deleteAffiliate($id)
    {
        $affected_rows = User::find($id)->delete();
        $message = set_message($affected_rows,'Affiliate','Deleted');
        Session::put('message', $message);
        return Redirect('admin/affiliate');
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
   
}

?>
