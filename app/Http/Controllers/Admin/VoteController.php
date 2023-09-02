<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vote;
use App\Models\Nominie;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Log;
use DB;

class VoteController extends Controller
{
    public function index(){
        $voteList = Vote::orderBy('id','desc')->get();

        return view('admin-view.vote.index',compact('voteList'));
    }

    public function view($id){
        $vote = Vote::where('id',base64_decode($id))->first();

        return view('admin-view.vote.view',compact('vote'));
    }

    public function voteCountList(){

        $voteCountList = Vote::select('candidate_id',DB::raw('COUNT(candidate_id) as count'))
                             ->groupBy('candidate_id')
                             ->orderBy('id','asc')
                             ->get();

        return view('admin-view.vote.votecountlist',compact('voteCountList'));
    }

    public function teacherVoteCountList(){

        $teacherVoteCountList = Vote::leftjoin('candidates','candidates.id','=','votes.candidate_id')
                                    ->select('votes.candidate_id',DB::raw('COUNT(votes.candidate_id) as count'))
                                    ->where('candidates.category_id',1)
                                    ->groupBy('votes.candidate_id')
                                    ->orderBy('candidates.id','asc')
                                    ->get();
       
        return view('admin-view.vote.teachervotecountlist',compact('teacherVoteCountList'));
    }

    public function studentVoteCountList(){

        $studentVoteCountList = Vote::leftjoin('candidates','candidates.id','=','votes.candidate_id')
                                    ->select('votes.candidate_id',DB::raw('COUNT(votes.candidate_id) as count'))
                                    ->where('candidates.category_id',2)
                                    ->groupBy('votes.candidate_id')
                                    ->orderBy('candidates.id','asc')
                                    ->get();
       
        return view('admin-view.vote.studentvotecountlist',compact('studentVoteCountList'));
    }

    public function schoolVoteCountList(){

        $schoolVoteCountList = Vote::leftjoin('candidates','candidates.id','=','votes.candidate_id')
                                    ->select('votes.candidate_id',DB::raw('COUNT(votes.candidate_id) as count'))
                                    ->where('candidates.category_id',3)
                                    ->groupBy('votes.candidate_id')
                                    ->orderBy('candidates.id','asc')
                                    ->get();
       
        return view('admin-view.vote.schoolvotecountlist',compact('schoolVoteCountList'));
    }
}
