<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\Customer\Reminder;
use App\Models\Customer\Invoice;
use App\Models\Customer\InvoiceDetail;
use App\Models\Customer\Customer;
class UserController extends Controller
{
        /*
***************USER***************
    */
	public  function user($id=-1){
        $data['page_title'] = "Add User";
            if($id!=-1){
            $data['page_title'] = "Update User";
            $data['results']=App\Models\User::where('id', $id)->first();
            }
        return view('user.save_user',compact('data'));
    }
    public function saveuser(Request $request){
            $id=$request->id;
 			$modal = new App\Models\User;
            $data=$request->all();
              $data['password']=bcrypt($request->password);
                $action="Added";
        	if($id){
                  $action="Updated";
                  $modal=App\Models\User::find($id);
                  $affected_rows =$modal->update($data);
                }
            else{
                $affected_rows =  $modal::create($data);
            	}
        Session::put('message', set_message($affected_rows,'User',$action));
        return Redirect('/users');
    }
    public  function users(){
        $data['page_title'] = "Users";
        $data['roles'] = App\Models\Role::where('role_title','!=','SuperUser')->get();
        $data['results'] =  App\Models\User::all();
        return view('user.view_users',compact('data'));
    }
    public function suspenduser($id){
        $modal = App\Models\User::find($id);
        $affected_rows=$modal->update(array('status'=>1));
        if($affected_rows>0) {
            $message['title']= 'Success';
             $message['text'] = "User suspended Successfully";
        }
        else {
            $message['title']= 'Error';
            $message['text'] = "Something went wrong";
            }
        Session::put('message', $message);
        return redirect()->back();
    } 
    public function deleteuser($id){
      	$modal = App\Models\User::find($id);
        $affected_rows=$modal->delete();
        Session::put('message', set_message($affected_rows,'User','deleted'));
        return redirect()->back();
    }


    public function dashboard($search=-1)
    {
        $data['page_title']='Home';
        // $results=Reminder::whereDate('start_time',date('Y-m-d'))->where('is_done',0)->get();
        $results=Reminder::where('is_done',0)->get();
          
           $from='home';
            $data['reminders']= view('admin.customer.reminder.view',compact('results','from'))->render();
            $total=InvoiceDetail::join('invoices','invoices.id','=','invoice_detail.invoice_id')->sum('total');
            $paid=InvoiceDetail::join('invoices','invoices.id','=','invoice_detail.invoice_id')->where('invoices.paid',1)->sum('total');
            // dd($total);
            $outstanding=$total-$paid;
            $data['total']=$total;
            $data['paid']=$paid;
            $data['outstanding']=$outstanding;
        return view('home',compact('data'));
    }
    public function profile()
    {
        $data['page_title']=' My Profile';
        return view('user.profile',compact('data'));
    } 
    /*
***************ROLE***************
    */
      public  function roles(){
        $data['page_title'] = "Roles";
        $data['results'] =  App\Models\Role::where('role_title','!=','SuperUser')->get();
          return view('user.view_roles',compact('data'));
    }
     public function saverole(Request $request){
            $id=$request->role_id;
            $modal = new App\Models\Role;
            $data=$request->all();
             $action="Added";
         unset($data['id']);
            if($id){
                 $action="Updated";
                 $modal = App\Models\Role::find($id);
                 $affected_rows =  $modal->update($data);
                }
            else{
                $affected_rows =  $modal::create($data);
                }
      Session::put('message', set_message($affected_rows,'Role',$action));
        return Redirect('/roles');
    }
     public function deleterole($id){
        $modal = App\Models\Role::find($id);
        $affected_rows=$modal->delete();
        Session::put('message', set_message($affected_rows,'User','deleted'));
        return redirect()->back();
    }

    public function roleaccess($id=-1)
    {
//        dd($id);
        $data['page_title'] ='Role Access';
        $data['roles'] = App\Models\Role::where('role_title','!=','SuperUser')->get();
        $data['role']=App\Models\Role::find($id);
        if(empty($data['role']))
        {
            $data['role_access']= json_encode(array());
            $data['access']= array();
        }
        else{
            $data['role_access']= json_decode($data['role']->role_access);
            if($data['role_access']){
                $data['role_access']= implode(',',$data['role_access']);
            }

            $data['access']=App\Models\RolePrivileges::where('role_id',$id)->pluck('access')->toArray();
        }
//        dd($data['access']);

        return view('user.role_access',compact('data'));
    }

    public function saveroleaccess(Request $request)
    {
//        dd($request->role_access);
        if($request->role_access){
            App\Models\RolePrivileges::where('role_id',$request->role_id)->delete();
            foreach ($request->role_access as $key=>$value){
                $data = array(
                    'access'=>$value,
                    'role_id'=>$request->role_id,
                );
//                dd($value);
                $modal=App\Models\RolePrivileges::create($data);
            }
        }


//        dd(implode(',',$request->access));
        $data = array(
            'role_access'=>json_encode($request->access),
        );
        $modal=App\Models\Role::find($request->role_id);
//        dd($data);

        $affected_rows=$modal->update($data);
        if($affected_rows>0) {
            $message['title']= 'Success';
            $message['text'] = 'Access Permissions Updated Successfully';
        }
        else {
            $message['title']= 'Error';
            $message['text'] = 'Something went wronog';
        }
        Session::put('message', $message);
        return Redirect('/roleaccess/'.$request->role_id);
    }




    
}