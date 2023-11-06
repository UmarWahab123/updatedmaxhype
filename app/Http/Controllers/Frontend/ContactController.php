<?php



namespace App\Http\Controllers\Frontend;



use App\Http\Controllers\Controller;



use Illuminate\Http\Request;



use App;



use App\Models\User;



use App\Models\Contacts\Contact;



use App\Models\Subscriptions\Subscription;



use App\Http\Requests;



use Illuminate\Support\Facades\Mail;


use App\Mail\TestMail;



use Illuminate\Support\Facades\Hash;



use Illuminate\Support\Facades\Session;



// use Illuminate\Support\Facades\Auth;



class ContactController extends Controller



{



  public function contacts(){

    // dd(env('FORM_DATA'));

    return view('frontend.contact.contacts');



  }
  public function savecontact(Request $request){
        $data = $request->all();
        dd(env('FORM_DATA'));
        putenv("APP_ENV=production");

         putenv('FORM_DATA = Testing');
         dd(env('FORM_DATA'));
        $action = "Added";
        $affected_rows = Contact::create($data);
        $this->send_email_test1($request->email,'Welcome to Maxhype','frontend.emails.contacts_email',$data);
        $response = array('response' =>$affected_rows);
        return json_encode($response);
 }

 function send_email_test1($email,$subject,$template,$data)

    {



      Mail::send($template, ['data'=>$data], function($message) use ($subject, $email) {



              $message->to($email,$subject)->subject($subject);



              $message->from('support@themaxhype.com',$subject);



         });



    }



  public function save_subscriber(Request $request){



        $data['results'] = $request->all();



        $affected_rows=Subscription::create($data['results']);

        $data['email'] = $request->email;

        $email="Newsletter@themaxhype.com";



   $this->send_email_test1($email,'One New Subscription','frontend.emails.subscribe',$data);



        $response=array('response'=>'You have Successfully Subscribed!');



        return json_encode($response);



   }



}



?>