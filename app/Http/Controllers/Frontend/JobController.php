<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;

use App\Models\Careers\Careers;

use App\Models\Applicants\Applicant;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

use DB;

class JobController extends Controller

{ 

 public function careers()
  {
    $data['results']=Careers::get();
    return view('frontend.careers.careers',compact('data'));
    
  }
  public function apply_now($id)
  {
  $data['id'] = $id;
  return view('frontend.careers.apply_now',compact('data'));
  }
  public function save_applicant(Request $request)
   {

      $data = $request->all();

      $image=$request->cv_file;

      $action = "Added";

      $affected_rows = Applicant::create($data);

      $image=url($image);

      $response = array('response' =>$image);

      return json_encode($response);
  }
   public function uploadfile(Request $request)
    {
  // print_r('expression');exit();
        $path=$_GET['url'];
        dd($path);
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