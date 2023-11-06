<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;

use App\Models\Role\Role;

use App\Models\Contacts\Contact;

use App\Models\User;

use App\Models\Video;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller

{



    public  function role($id = -1)

    {

        $data['page_title'] = "Add Role";

        if ($id != -1) {

            $data['page_title'] = "Update Role";

            $data['results'] = Role::where('id', $id)->first();

        }

        return view('roles.save', compact('data'));

    }

    public function userstatus(Request $request){

        $id = $request->id;

        $data = $request->all();

        $affected_rows = User::find($id)->update($data);

        $response=array('status'=>1,'msg'=>'Data Updated');

        $response=json_encode($response);

        return $response;

    }

    public function saverole(Request $request)

    {

        $id = $request->id;
        
        $data = $request->all();


        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Role::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Role::create($data);

        }

        $message=   set_message($affected_rows,'Role',$action);

        Session::put('message', $message);

        return Redirect('/admin/roles');

    }

    public  function roles()

    {

        $data['page_title'] = "Roles";

        $data['results'] =  Role::get();

        return view('roles.index', compact('data'));

    }

    public function deleterole($id)

    {

        $affected_rows = Role::find($id)->delete();

        $message=   set_message($affected_rows,'Role','Deleted');

        Session::put('message', $message);

        return redirect()->back();

    }

    public  function users()

    {

        $data['page_title'] = "Users";

        $data['results'] =  User::get();

        return view('users.index', compact('data'));

    }

    public  function user($id = -1)

    {

        $data['page_title'] = "Add User";

        $data['roles'] = Role::get();
        $data['affiliate'] = User::where('role_id',4)->get();
        

        if ($id != -1) {

            $data['page_title'] = "Update User";

            $data['results'] = User::where('id', $id)->first();

        }

        return view('users.save', compact('data'));

    }

    public function saveuser(Request $request)

    {

        $id = $request->id;
 
        $data = $request->all();
        if($request->role_id==4){
            $data['referral_code'] = uniqid();            
         }
         //dd($data);

        unset($data['cpassword']);



        $action = "Added";

        if(!empty($data['password'])){

            $data['password'] = Hash::make($data['password']);

        }else{

            unset($data['password']);

        }

        if ($id) {

            $action = "Updated";

            $affected_rows = User::find($id)->update($data);

        } else {

            $affected_rows =  User::create($data);

        }

        $message=   set_message($affected_rows,'User',$action);

        Session::put('message', $message);

        return Redirect('/admin/users');

    }



    public function deleteuser($id)

    {

        $affected_rows = User::find($id)->delete();

        $message = set_message($affected_rows,'User','Deleted');

        Session::put('message', $message);

        return Redirect('admin/users');

    }

    // User Messages

    public function usermessages()

    {

        $data['page_title'] = "User Queries";

        $data['results'] = Contact::get();

        return view('messages.view', compact('data'));

    }

    public function messagemodal($id){

        $modal = view('messages.details',compact('data'))->render();

        $response=array('response'=>$modal);

        return json_encode($response);   

    }

    public function adminlogout(Request $request){

        $user=Auth::user();

        Auth::logout();

        Session::flush();

        return redirect('admin/login');  

    }

    public  function video()

    {

        $data['page_title'] = "Videos";

        $data['results'] =  Video::get();

        return view('videos.index', compact('data'));

    }

    public  function videos($id = -1)

    {

        $data['page_title'] = "Add Videos URL";

        $data['business'] = User::where('role_id',3)->get();



        if ($id != -1) {

            $data['page_title'] = "Update Videos URL";

            $data['results'] = Video::where('id', $id)->first();

        }

        return view('videos.save', compact('data'));

    }

    public function savevideo(Request $request)

    {

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $modal = Video::find($id);

            $affected_rows = $modal->update($data);

        } else {

            $affected_rows =  Video::create($data);

        }

        $message = set_message($affected_rows,'Video URL',$action);

        Session::put('message', $message);

        return Redirect('/admin/video');

    }

    public function deletevideo($id)

    {

        $affected_rows = Video::find($id)->delete();

        $message = set_message($affected_rows,'Video URL','Deleted');

        Session::put('message', $message);

        return redirect()->back();

    }

}



?>

