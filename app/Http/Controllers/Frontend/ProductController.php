<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
 public function productmodal(Request $request)
     {   
        $data['users_id'] = $request->users_id;
         $data['results'] = Product::where('id',$request->id)->first();
        // $data['business'] = User::where('role_id',3)->get();
        $modal = view('frontend.dashboard.partial.product_form', compact('data'))->render();
        $response = array('response'=>$modal);
        return json_encode($response);

    }
    public function saveproduct(Request $request,$type='business')
    {
        $id = $request->id;
        $data = $request->all();
        if($request->hasfile('product_dp')){
            $file = $request->file('product_dp');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . "." . $extension;
            $file->move('public/uploads/businessproducts/', $filename);
            $data['product_dp'] = 'public/uploads/businessproducts/' . $filename;

            $request->product_dp = $data['product_dp'];
        }
        if(!isset($data['tickets_available'])){
            $data['tickets_available']=0;
        }
        $action = "Added";
        if ($id){
            $action = "Updated";
            $modal = Product::find($id);
            $affected_rows = $modal->update($data);
        } else {
            $affected_rows = Product::create($data);
        }
        $data['type']=$type;
        $data['products'] = Product::where('business_id', $request->business_id)->get();
        $response = view('frontend.dashboard.partial.products', compact('data'))->render();
        $response = array('response' => $response);
        return json_encode($response);
    }
    public function deleteproduct($id)
    {
        $modal = Product::find($id);
        $user_id=$modal->business_id;
        $affected_rows = $modal->delete();
        $data['type']='business';
        $data['products'] = Product::where('business_id', $user_id)->get();
        $response = view('frontend.dashboard.partial.products', compact('data'))->render();
        $response = array('response' => $response);
        return json_encode($response);
    }

    
}
?>