<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\User;
use App\Models\Role\Role;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
 public function userlogin(){
  $data['roles'] = Role::get();
  return view('frontend.auth.register',compact('data'));
 }
 public function register_user(Request $request){
        $id = $request->id;
        $data = $request->all();
        $email_exist=User::where('email',$request->email)->first();
        if(!empty($email_exist)){
        $response = array('response' => 0);
        return json_encode($response);
        }
        else{
        $action = "Added";
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        if ($id){
            $action = "Updated";
            $modal = User::find($id);
            $affected_rows = $modal->update($data);
        } else {
            $affected_rows = User::create($data);
        }
        // $this->send_email_test1($request->email,'Welcome to Maxhype','frontend.emails.mail',$data);
        $response = array('response' => 1);
        return json_encode($response);
    }
 }

   function send_email_test1($email,$subject,$template,$data)
    {
        Mail::send($template, ['data'=>$data], function($message) use ($subject, $email) {
                $message->to($email,$subject)->subject($subject);
                $message->from('wahabumaar@gmail.com',$subject);
           });
    }

 public function userlog()
    {
        $remember = false;
        if (isset($_POST['remember'])) {
            $remember = true;
        }
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            $user = Auth::user();
            if ($user->status == "Inactive") {
                Auth::logout();
                Session::flush();
                $message['title'] = 'Error';
                $message['text'] = "Your account is inactive. Kindly connect administrator";
                Session::put('message', $message);
                Session::put('login_msg', "Your account is inactive. Kindly connect administrator");
                return redirect()->back();
            }
            return Redirect('/');
        } else {
            $message['title'] = 'Error';
            $message['text'] = "Credetional do not match our record";
            Session::put('message', $message);
            Session::put('login_msg', "Credetional do not match our record");
            return redirect()->back();
        }

    }
  public function logout(){
     Auth::logout();
     Session::flush();
    return redirect('/businesreg');
  }
 
}
?>