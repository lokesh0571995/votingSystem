<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Log;
use DB;

class VoterController extends Controller
{
    public function index(){
        $voterList = User::where('user_type','Voter')->orderBy('id','desc')->get();

        return view('admin-view.voter.index',compact('voterList'));
    }

    public function view($id){
        $voter = User::where('id',base64_decode($id))->first();

        return view('admin-view.voter.view',compact('voter'));
    }

    public function destroy($id){

        $voter = User::where('id',base64_decode($id))->first();
        $voter->delete();

        return redirect()->back()->with(['success'=>'Voter removed successfully!']);
    }
}
