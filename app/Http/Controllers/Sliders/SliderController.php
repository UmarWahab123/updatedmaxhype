<?php
namespace App\Http\Controllers\Sliders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Slider\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class SliderController extends Controller
{	
    public function slider()
    {
        $data['page_title'] = "Home Slider";
        $data['results'] = Slider::get();
        return view('slider.view', compact('data'));
    }
    public function sliders($id = -1)
    {
        $data['page_title'] = "Add Slider";
        if ($id != -1) {
            $data['page_title'] = "Update Slider";
            $data['results'] = Slider::where('id', $id)->first();
        }
        return view('slider.save', compact('data'));
    }
    public function saveslider(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $affected_rows = Slider::find($id)->update($data);
        } else {
            $affected_rows = Slider::create($data);
        }
        $message= set_message($affected_rows,'Slider',$action);
        Session::put('message', $message);
        return Redirect('admin/slider');
    }

    public function deleteslide($id)
    {
        $affected_rows = Slider::find($id)->delete();
        $message = set_message($affected_rows,'Slider','Deleted');
        Session::put('message', $message);
        return Redirect('admin/slider');
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
