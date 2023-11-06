<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use App\Models\User;
use App\Models\Reservations\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
 public function customer_dashbord($id)
 {
  $data['results'] = User::where('id',$id)->first()->toArray();
 // dd($data['results']);
  $data['reservation'] = Reservation::where('customer_id',$id)->where('type','Reservation')->get()->toArray();
  $data['purchase'] = Reservation::where('customer_id',$id)->where('type','Purchase')->get()->toArray(); 
  $response = array('status'=>1,'dashboard'=>$data['results'],'reservation'=>$data['reservation'],'purchase'=>$data['purchase']);
  return json_encode($response);
  }
public function update_info(Request $request){
   $id = $request->id;
   $data = $request->all();
   $affected_rows = User::find($id)->update($data);
   $response = array('status'=>1);
   return json_encode($response);
  }
}
?>