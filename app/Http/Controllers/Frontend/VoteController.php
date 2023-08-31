<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Validate;
use Session;
use App\Models\Nominie;
use App\Models\Candidate;
use App\Models\Vote;
use Stripe;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;


class VoteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voting()
    {
        $approvedNominie = Nominie::where('status',1)->get();

        return view('frontend.voting_list',compact('approvedNominie'));
    }

    //payment method

    public function stripe(Request $request){

        $request->validate([
            'nominie_id'   => 'required',
            'amount'           => 'required',
  
        ]);
        $nominie_id   = $request->nominie_id;
        $amount       = $request->amount;
      
        return view('frontend.payment',compact('nominie_id','amount'));
    }

    //payment method

    public function payment(Request $request){
       
        $request->validate([
            'card_holder_name'   => 'required',
            'card_number'        => 'required',
            'cvc'                => 'required|numeric',
            'expiry_month'       => 'required|numeric',
            'expiry_year'        => 'required|numeric',
          
        ]);
        
        
        $amount       =$request->amount;
        $candidate_id =$request->nominie_id;

            $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            try {
                $response = \Stripe\Token::create(array(
                    "card" => array(
                        "number"    => $request->input('card_number'),
                        "exp_month" => $request->input('expiry_month'),
                        "exp_year"  => $request->input('expiry_year'),
                        "cvc"       => $request->input('cvc')
                    )));
                if (!isset($response['id'])) {
                    return redirect()->back();
                }
                $charge = \Stripe\Charge::create([
                    'card'        => $response['id'],
                    'currency'    => 'R',
                    'amount'      =>  $amount * 100,
                    'description' => 'Stripe Payment',
                ]);
    
                if($charge['status'] == 'succeeded') {

                    $payment = new Payment();
                    $payment->user_id        = Auth::id();
                    $payment->amount         = $amount;
                    $payment->payment_method = 'stripe online';
                    $payment->transaction_id =  $charge['status']['id'];
                    $payment->save();

                    if($payment->save()){

                        $vote = new Vote();
                        $vote->user_id        = Auth::id();
                        $vote->candidate_id   = $candidate_id;
                        $vote->payment_id     = $payment->id;
                        $vote->save();
                    }
                    return redirect()->back()->with('success', 'Voted Successfully!');
    
                } else {
                    return redirect()->back()->with('error', 'something went to wrong.');
                }
    
            }
            catch (Exception $e) {
                return $e->getMessage();
            }
 
       
        return redirect()->back()->with('success','Voted Successfully!');

    }

    // public function payment(Request $request){

    //     $request->validate([
    //         'card_holder_name'   => 'required',
    //         'card_number'        => 'required',
    //         'cvv'                => 'required|numeric',
    //         'month'              => 'required|numeric',
    //         'year'               => 'required|numeric',
          
    //     ]);

    //     $amount       =$request->amount;
    //     $candidate_id =$request->nominie_id;

    //     $token = $this->createToken($request);
    //     if (!empty($token['error'])) {
    //         $request->session()->flash('danger', $token['error']);
    //         return redirect()->back();
    //     }
    //     if (empty($token['id'])) {
    //         $request->session()->flash('danger', 'Payment failed.');
    //         return redirect()->back();
    //     }

    //     $charge = $this->createCharge($token['id'], 2000);
    //     if (!empty($charge) && $charge['status'] == 'succeeded') {
    //         $request->session()->flash('success', 'Payment completed.');
    //     } else {
    //         $request->session()->flash('danger', 'Payment failed.');
    //     }
       
    //     return redirect()->back()->with('success','Payment Successfully!');

    // }

    // private function createToken($cardData)
    // {
    //     $token = null;
    //     $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     try {
    //         $token = \Stripe\Token::create([
    //             'card' => [
    //                 'number'    => $cardData['card_number'],
    //                 'exp_month' => $cardData['month'],
    //                 'exp_year'  => $cardData['year'],
    //                 'cvc'       => $cardData['cvv']
    //             ]
    //         ]);
    //     } catch (CardException $e) {
    //         $token['error'] = $e->getError()->message;
    //     } catch (Exception $e) {
    //         $token['error'] = $e->getMessage();
    //     }
    //     return $token;
    // }

    // private function createCharge($tokenId, $amount)
    // {
    //     $charge = null;
    //     $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     try {
    //         $charge = \Stripe\Charge::create([
    //             'amount' => $amount,
    //             'currency' => 'usd',
    //             'source' => $tokenId,
    //             'description' => 'My first payment'
    //         ]);
    //     } catch (Exception $e) {
    //         $charge['error'] = $e->getMessage();
    //     }
    //     return $charge;
    // }


}
