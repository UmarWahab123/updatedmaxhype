<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Reservations\Reservation;
use App\Models\Bookings\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmation()
    {
        return view('frontend.paypal.transactions');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction($id,$type3)
    {
     if($type3=="Booking"){
        $data['booking'] = Booking::where('id',$id)->first();
        $amount=$data['booking']->total_price;
       }else{
        $data['purchase'] = Reservation::where('id',$id)->first();
        $amount=$data['purchase']->total_price;
       }
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction').'/'.$id.'/'.$type3,
                "cancel_url" => route('cancelTransaction').'/'.$id.'/'.$type3,
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amount
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('confirmation')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('confirmation')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request,$id,$type3)
    {
     if($type3=="Booking"){
        $data['booking'] = Booking::where('id',$id)->update(['status'=>'Paid']);
        }else{
        $data['purchase'] = Reservation::where('id',$id)->update(['status'=>'Paid']);
        }
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('confirmation')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('confirmation')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction($id,$type3)
    {
        if($type3=="Booking"){
          $data['booking'] = Booking::where('id',$id)->first();
          $users_id=$data['booking']->users_id;
          $data['business'] = User::where('id',$users_id)->delete();
          $data['booking'] = Booking::where('id',$id)->delete();
        }else{
          $data['purchase'] = Reservation::where('id',$id)->delete();
        }
        return redirect()
            ->route('confirmation')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}