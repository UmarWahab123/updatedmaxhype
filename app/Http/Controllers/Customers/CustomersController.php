<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;

use App\Models\User;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller

{	

    public function customer()

    {

        $data['page_title'] = "All Customers";

        $data['results'] = User::where('role_id',5)->get();

        return view('customers.view', compact('data'));

    }

    public function customers($id = -1)

    {        

        $data['page_title'] = "Add Customer";

        if ($id != -1) {

            $data['page_title'] = "Update Customer";

            $data['results'] = User::where('id', $id)->first();

        }

        return view('customers.save', compact('data'));

    }

    public function savecustomer(Request $request)

    {        

        $id = $request->id;

        $data = $request->all();

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $affected_rows = User::find($id)->update($data);

        } else {

            $affected_rows = User::create($data);

        }

        $message= set_message($affected_rows,'Customer',$action);

        Session::put('message', $message);

        return Redirect('admin/customer');

    }



    public function deletecustomer($id)

    {

        $affected_rows = User::find($id)->delete();

        $message= set_message($affected_rows,'Customer','Deleted');

        Session::put('message', $message);

        return Redirect('admin/customer');

    }

    public function customermodal($id){

        $data['customer'] = User::where('id',$id)->first();

        $modal = view('customers.details',compact('data'))->render();

        $response=array('response'=>$modal);

         return json_encode($response);   

    }

}



?>

