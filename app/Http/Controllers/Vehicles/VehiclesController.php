<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Vehicles\Vehicle;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class VehiclesController extends Controller
{	

    public function vehiclemodal($id)

    {

        $data['vehicle'] = Vehicle::where('id', $id)->first();

        $modal = view('vehicles.details',compact('data'))->render();

        $response = array('response' => $modal);

        return json_encode($response);

    }

    public function vehicle()

    {

        $data['page_title'] = "All Vehicle Categories";

        $data['results'] = Vehicle::get();
// dd($data['results']);
        return view('vehicles.view', compact('data'));

    }

    public function vehicles($id = -1)

    {

        $data['page_title'] = "Add Vehicle Category";

        if ($id != -1) {

            $data['page_title'] = "Update Vehicle Category";

            $data['results'] = Vehicle::where('id', $id)->first();

        }

        return view('vehicles.save', compact('data'));

    }

    public function savevehicles(Request $request)

    {

        $id = $request->id;

        $data = $request->all();
        dd($data);

        $action = "Added";

        if ($id) {

            $action = "Updated";

            $affected_rows = Vehicle::find($id)->update($data);

        } else {

            $affected_rows = Vehicle::create($data);

        }

     $response = array('response' => $affected_rows);
     return json_encode($response);

    }



    public function deletevehicle($id)

    {

        $affected_rows = Vehicle::find($id)->delete();

        $message= set_message($affected_rows,'Vehicle','Deleted');

        Session::put('message', $message);

        return Redirect('admin/vehicle');

    }

}



?>

