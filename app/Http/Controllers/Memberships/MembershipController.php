<?php
namespace App\Http\Controllers\Memberships;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use App\Models\Memberships\Membership;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class MembershipController extends Controller
{
 public function membership(){
 $data['page_title'] = "All Memberships Packages";
 $data['results'] = Membership::get();
 return view('membership.index', compact('data'));

 }
  public function memberships($id = -1)
    {
        $data['page_title'] = "Add Membership Package";
        if ($id != -1) {
            $data['page_title'] = "Update Membership Package";
            $data['results'] = Membership::where('id', $id)->first();
        }
        return view('membership.save', compact('data'));
    }
    public function save_membership(Request $request)
    {    
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $affected_rows = Membership::find($id)->update($data);
        } else {
            $affected_rows = Membership::create($data);
        }
        $message= set_message($affected_rows,'Membership',$action);
        Session::put('message', $message);
        return Redirect('admin/membership');
    }
    public function delete_membership($id)
    {
        $affected_rows = Membership::find($id)->delete();
        $message = set_message($affected_rows,'Membership','Deleted');
        Session::put('message', $message);
        return Redirect('admin/membership');
    }

  
}

?>
