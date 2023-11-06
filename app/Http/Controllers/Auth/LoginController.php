<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/admin/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    public function login(){
        return view('auth.login');
    }
    public function userlogin(Request $request)
    {
       $users=User::get();
       foreach ($users as $key => $value) {
           $user=User::find($value->id)->update(['password'=>bcrypt(123456)]);
       }
       // dd('sdaf');
        $email = $request->get('email');
        $password = $request->get('password');
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user=Auth::user();
            if($user->status=="Inactive"){
                Auth::logout();
                 Session::put("login_error",'Sorry! Your account is suspended. Contact our support team for further info');
                return redirect('admin/login');
            }
         return redirect('/admin/home');
        }
        else
        {
            Session::put("login_error",'Credentials do not match our records');
            return redirect('/admin/login');
        }
        // $SiteUser = Login::where('email',$request->email)->where('password',md5($request->password))->first();
        // dd($SiteUser);
        // session_start();
        // if($SiteUser)
        // {
        // Session::put('login', $SiteUser);
        //     return Redirect('/home');
        // }
        // else
        // {
        //     return redirect('/login');
        // }
    }
     public function applogin(Request $request){
          $data=$request->all();
        //   dd($data);
          //$remember=$data['checkbox_remember_me'];
          $data=$data['userDetails'];
          $email=$data['email'];
          $password=$data['password'];
          $data=array(
              'status'=>0,
          );
           if (Auth::attempt(['email' => $email, 'password' => $password])) {
                 $user = Auth::user();
                //  $_SESSION['user']=$user;
                // Session::put("user",$user);
        //   $user=User::where('email',$email)->where('password',\Hash::check(request('password'),$password))->first();
        //   dd($user);
          if ($user) {
                  $data=array(
                      'id'=>$user->id,
                      'role_id'=>$user->role_id,
                      'first_name'=>$user->first_name,
                      'last_name'=>$user->last_name,
                      'last_name'=>$user->last_name,
                      'email'=>$user->email,
                      'phone_number'=>$user->phone_number,
                      'hide_msg'=>$user->hide_msg,
                      'dp'=>$user->dp,
                      'status'=>1,
                  );
          // dd($user);
          }
           }
        // $get=Session::get('user');
        // dd($get);
          $response = array('response' => $data);
           //dd($response);
          return json_encode($response);
   }
     public function get_user($id)
     {
         $data=User::where('id',$id)->first();
          $response = array('response' => $data);
           //dd($data);
          return json_encode($response);
     }
}