<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nominie;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Storage;
use Validator;
use Session;
use Log;
use DB;

class NomineeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomineeList = Nominie::orderBy('id','desc')->get();

        return view('admin-view.nominee.index',compact('nomineeList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nominee = Nominie::where('id',base64_decode($id))->first();

        return view('admin-view.nominee.view',compact('nominee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nominee = Nominie::where('id',base64_decode($id))->first();
        
        $nominee->delete();

        return redirect()->back()->with(['success'=>'Nominee removed successfully!']);
    }


    /**
     * Approve the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $nominee = Nominie::where('id',base64_decode($id))->where('status',0)->first();
        $nominee->status =1;
        $nominee->save();
        // if($nominee->save()){

        //     Candidate::where('id',$nominee)->where('approved',0)->update(['approved'=>1]);
        // }
        return redirect()->back()->with(['success'=>'Nominee approved successfully!']);
    }

    /**
     * Reject the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject($id)
    {
        $nominee = Nominie::where('id',base64_decode($id))->where('status',1)->first();
        $nominee->status =0;
        $nominee->save();
        // if($nominee->save()){

        //     Candidate::where('id',$nominee)->where('approved',1)->update(['approved'=>0]);
        // }
                
        return redirect()->back()->with(['success'=>'Nominee rejected successfully!']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approveNominie()
    {
        $nomineeList = Nominie::where('status',1)->orderBy('id','desc')->get();

        return view('admin-view.nominee.approveniminielist',compact('nomineeList'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejectNominie()
    {
        $nomineeList = Nominie::where('status',0)->orderBy('id','desc')->get();

        return view('admin-view.nominee.rejectniminielist',compact('nomineeList'));
    }
}
