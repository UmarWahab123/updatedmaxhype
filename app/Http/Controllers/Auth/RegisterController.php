<?php



namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\Session;





class RegisterController extends Controller



{



    /*



    |--------------------------------------------------------------------------



    | Register Controller



    |--------------------------------------------------------------------------



    |



    | This controller handles the registration of new users as well as their



    | validation and creation. By default this controller uses a trait to



    | provide this functionality without requiring any additional code.



    |



    */







    use RegistersUsers;







    /**



     * Where to redirect users after registration.



     *



     * @var string



     */



    protected $redirectTo = RouteServiceProvider::HOME;







    /**



     * Create a new controller instance.



     *



     * @return void



     */



    public function __construct()



    {



        $this->middleware('guest');



    }







    /**



     * Get a validator for an incoming registration request.



     *



     * @param  array  $data



     * @return \Illuminate\Contracts\Validation\Validator



     */



    protected function validator(array $data)



    {



        return Validator::make($data, [



            'name' => ['required', 'string', 'max:255'],



            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],



            'password' => ['required', 'string', 'min:8', 'confirmed'],



        ]);



    }







    /**



     * Create a new user instance after a valid registration.



     *



     * @param  array  $data



     * @return \App\Models\User



     */



    protected function create(array $data)



    {



        return User::create([



            'name' => $data['name'],



            'email' => $data['email'],



            'password' => Hash::make($data['password']),



        ]);



    }







    public function register_user(Request $request){



            $id=$request->id;



            $data=$request->all();



            // dd($request);



            $data['password']=Hash::make($data['password']);



            if($id){



            $affected_rows = User::find($id)->update($data);



            }else{



            $affected_rows = User::create($data);



            }



            $response=array('response'=>$data,'status'=>1);



            return json_encode($response);







    }



    public function customerregister(Request $request){


        $id = $request->id;



        $data = $request->all();


        $email_exist=User::where('email',$request->email)->first();



        if(!empty($email_exist)){



        $response = array('response' => 0);



        return json_encode($response);



        }

        else{

         if($request->role_id==4){
            $data['referral_code'] = uniqid();  
              
            $this->send_email_test1($request->email,'Welcome to Maxhype','emails.register_mail',$data);        

         }elseif($request->role_id==3){

         $code_exist=User::where('referral_code',$request->referral_code)->first();

         if(!empty($code_exist)){

            $data['affiliate_id']=$code_exist->id;

            unset($data['referral_code']);

         }

         else{

          $response = array('response' => 2);

          return json_encode($response);

         }

       }

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



        }else {



            $affected_rows = User::create($data);

             event(new Registered($affected_rows));



        }

         

       


        $response = array('response' => 1);



        return json_encode($response);



    }



 }

  function send_email_test1($email,$subject,$template,$data)



    {



        Mail::send($template, ['data'=>$data], function($message) use ($subject, $email) {



                $message->to($email,$subject)->subject($subject);



                $message->from('support@themaxhype.com',$subject);



           });



    }



}



