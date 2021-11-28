<?php
namespace App\Http\Controllers\Packages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Packages\Packages;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class PackagesController extends Controller
{	
    public function packagemodal($id)
    {
        $data['package'] = Packages::where('id', $id)->first();
        $modal = view('packages.details',compact('data'))->render();
        $response = array('response' =>$modal);
        return json_encode($response);
    }
    public function package()
    {
        $data['page_title'] = "All Packages";
        $data['results'] = Packages::get();
        return view('packages.view', compact('data'));
    }
    public function packages($id = -1)
    {        
        $data['page_title'] = "Add Package";
        if ($id != -1) {
            $data['page_title'] = "Update Package";
            $data['results'] = Packages::where('id', $id)->first();
        }
        return view('packages.save', compact('data'));
    }
    public function savepackage(Request $request)
    {        
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $affected_rows = Packages::find($id)->update($data);
        } else {
            $affected_rows = Packages::create($data);
        }
        $message= set_message($affected_rows,'Package',$action);
        Session::put('message', $message);
        return Redirect('admin/package');
    }

    public function deletepackage($id)
    {
        $affected_rows = Packages::find($id)->delete();
        $message= set_message($affected_rows,'Packages','Deleted');
        Session::put('message', $message);
        return Redirect('admin/package');
    }
}

?>
