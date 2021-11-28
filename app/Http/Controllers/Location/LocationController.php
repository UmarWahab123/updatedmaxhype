<?php
namespace App\Http\Controllers\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Locations\Countries;
use App\Models\Locations\Cities;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Auth;
class LocationController extends Controller
{	
    //Country
    public function country()
    {
        $data['page_title'] = "All Countries";
        $data['results'] = Countries::get();
        return view('locations.countries.view',compact('data'));
    }
    public function countries($id = -1)
    {        
        $data['page_title'] = "Add Country";
        if ($id != -1) {
            $data['page_title'] = "Update Country";
            $data['results'] = Countries::where('id', $id)->first();
        }
        return view('locations.countries.save',compact('data'));
    }
    public function savecountries(Request $request)
    {        
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $affected_rows = Countries::find($id)->update($data);
        } else {
            $affected_rows = Countries::create($data);
        }
        $message= set_message($affected_rows,'Country',$action);
        Session::put('message', $message);
        return Redirect('admin/country');
    }

    public function deletecountry($id)
    {
        $affected_rows = Countries::find($id)->delete();
        $message= set_message($affected_rows,'Country','Deleted');
        Session::put('message', $message);
        return Redirect('admin/country');
    }
   //Location
    public function loction()
    {
        $data['page_title'] = "All Locations";
        $data['results'] = Cities::get();
        return view('locations.cities.view',compact('data'));
    }
    public function loctions($id = -1)
    {        
        $data['page_title'] = "Add Location";
        $data['country'] = Countries::get();
        if ($id != -1) {
            $data['page_title'] = "Update Location";
            $data['results'] = Cities::where('id', $id)->first();
        }
        return view('locations.cities.save',compact('data'));
    }
    public function saveloction(Request $request)
    {        
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $affected_rows = Cities::find($id)->update($data);
        } else {
            $affected_rows = Cities::create($data);
        }
        $message= set_message($affected_rows,'Location',$action);
        Session::put('message', $message);
        return Redirect('admin/loction');
    }

    public function deleteloction($id)
    {
        $affected_rows = Cities::find($id)->delete();
        $message= set_message($affected_rows,'Country','Deleted');
        Session::put('message', $message);
        return Redirect('admin/loction');
    }
    public function getcities($id)
    {
        $data['cities'] = Cities::where('location_country_id', $id)->get();
        $option = '';
        $option .= '<option value="">Select</option>';  
        foreach($data['cities'] as $value){
        $option .= '<option data-zipcode="'.$value->location_city_zipcode.'" value="'.$value->id.'">'.$value->location_city_name.'</option>';  
    }
      $response = array('response' =>$option);
        return json_encode($response);
}
}

?>
