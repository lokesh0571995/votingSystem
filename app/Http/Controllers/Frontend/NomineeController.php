<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Nominie;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Category;
use Auth;
use Hash;
use Validate;
use Session;

class NomineeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $candidate = Candidate::orderBy('id','desc')->get();
        // $category  = Category::orderBy('id','desc')->get();
        $candidate1 = Candidate::where('category_id','1')->orderBy('id','desc')->get();
        $candidate2 = Candidate::where('category_id','2')->orderBy('id','desc')->get();
        $candidate3 = Candidate::where('category_id','3')->orderBy('id','desc')->get();

        $category1   = Category::where('id','1')->first();
        $category2   = Category::where('id','2')->first();
        $category3   = Category::where('id','3')->first();

        return view('frontend.nomination',compact('candidate1','candidate2','candidate3','category1','category2','category3'));
    }


    //add nominee
    public function nomineeAdd(Request $request){

        $request->validate([
            'candidate_id'   => 'required',
            'category_id'    => 'required',
  
        ],[
              'candidate_id.required'=>'Nominee field is required.',
              'category_id.required' =>'Category field is required.'
        ]);
    
        $nominee = new Nominie();
        $nominee->user_id       = Auth::id();
        $nominee->candidate_id  = $request->candidate_id;
        $nominee->category_id   = $request->category_id;
        $nominee->save();

        return redirect('candidate/index')->with('success', 'Nominee added successfully!');

    }
}
