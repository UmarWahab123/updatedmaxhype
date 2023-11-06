<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
class LoginController extends Controller
{
  public function userlog(Request $request)
    {
         $remember = false;
           if(isset($_POST['remember'])) {
               $remember = true;
           }
           $email = $_POST['email'];
           $password = $_POST['password'];
           if(Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
               $user = Auth::user();
               if($user->status == "Rejected" || $user->status == "Pending") {
                   Auth::logout();
                   Session::flush();
                   Session::put('login_msg', "Your account is inactive. Kindly contact to administrator");
                   return redirect()->back();
               }if($user->role_id == 5){
                 return Redirect('/dashboards/'.$user->id);  
               }
           } else {
               Session::put('login_msg', "Credetional do not match our record");
               // dd(Session::get('login_msg'));
               return redirect()->back();
           }

    }
  public function customerregister(Request $request){
        $id = $request->id;
        $data = $request->all();
        $email_exist=User::where('email',$request->email)->first();
        if(!empty($email_exist)){
        $response = array('response' => 0);
        return json_encode($response);
        }
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        if($id){
            $action = "Updated";
            $modal = User::find($id);
            $affected_rows = $modal->update($data);
        }else {
            $affected_rows = User::create($data);
             event(new Registered($affected_rows));
        }
        $response = array('response' => 1);
        return json_encode($response);
    }
 }
?>