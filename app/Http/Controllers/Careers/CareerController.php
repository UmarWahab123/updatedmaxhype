<?php
namespace App\Http\Controllers\Careers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Position\Position;
use App\Models\Careers\Careers;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class CareerController extends Controller
{ 
   public  function position()
    {
        $data['page_title'] = "Careers Positions";
        $data['results'] = Position::get();
        return view('position.view', compact('data'));
    }
    public  function positions($id = -1)
    {
        $data['page_title'] = "Add Position";
        if ($id != -1) {
            $data['page_title'] = "Update Position";
            $data['results'] = Position::where('id', $id)->first();
        }
        return view('position.save', compact('data'));
    }
    public function saveposition(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = Position::find($id);
            $affected_rows = $modal->update($data);
        } else {
            $affected_rows = Position::create($data);
        }
        $message=   set_message($affected_rows,'Position',$action);
        Session::put('message', $message);
        return Redirect('/admin/position');
    }
    public function deleteposition($id)
    {
        $affected_rows = Position::find($id)->delete();
        $message=   set_message($affected_rows,'Position','Deleted');
        Session::put('message', $message);
        return redirect()->back();
    }
    public  function career()
    {
        $data['page_title'] = "All Posted Careers";
        $data['results'] =  Careers::get();
        return view('careers.view', compact('data'));
    }
    public  function careers($id = -1)
    {
        $data['page_title'] = "Add Careers";
        $data['position'] = Position::get();
        if ($id != -1) {
            $data['page_title'] = "Update Careers";
            $data['results'] = Careers::where('id', $id)->first();
        }
        return view('careers.save', compact('data'));
    }
    public function savecareer(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $action = "Added";
        $data['date'] = db_format_date($request->date);
        if ($id) {
            $action = "Updated";
            $affected_rows = Careers::find($id)->update($data);
        } else {
            $affected_rows = Careers::create($data);
        }
        $message=   set_message($affected_rows,'Careers',$action);
        Session::put('message', $message);
        return Redirect('/admin/career');
    }

    public function deletecareers($id)
    {
        $affected_rows = Careers::find($id)->delete();
        $message=   set_message($affected_rows,'Careers','Deleted');
        Session::put('message', $message);
        return Redirect('admin/career');
    }
    public function careermodal($id){
        $data['career'] = Careers::where('id',$id)->first();
        $modal = view('careers.details',compact('data'))->render();
        $response=array('response'=>$modal);
         return json_encode($response);   
    }
}

?>
