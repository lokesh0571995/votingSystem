<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Log;
use DB;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{

    public function index(){

        $payments = Payment::orderBy('id','desc')->get();

        return view('admin-view.payment.index',compact('payments'));
    }


    public function paymentList(){

        $paymentList = Payment::select('user_id',DB::raw('SUM(amount) as total_amount'))
                            ->groupBy('user_id')
                            ->orderBy('id','asc')
                            ->get();

        return view('admin-view.payment.paymentlist',compact('paymentList'));
    }
}
