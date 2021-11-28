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
    return view('frontend.contact.contacts');
  }
  public function savecontact(Request $request){
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        $affected_rows = Contact::create($data);
        $this->send_email_test1($request->email,'Welcome to Maxhype','frontend.emails.mail',$data);
         $response = array('response' =>$affected_rows);
        return json_encode($response);
 }
 function send_email_test1($email,$subject,$template,$data)
    {
      Mail::send($template, ['data'=>$data], function($message) use ($subject, $email) {
              $message->to($email,$subject)->subject($subject);
              $message->from('wahabumaar@gmail.com',$subject);
         });
    }
  public function save_subscriber(Request $request){
        $data = $request->all();
        $affected_rows=Subscription::create($data);
        $response=array('response'=>'You have Successfully Subscribed!');
        return json_encode($response);
   }
}
?>