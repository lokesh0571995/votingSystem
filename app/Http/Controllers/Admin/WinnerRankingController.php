<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WinnerRankingController extends Controller
{
    public function index(){

        $voteCountList = Vote::select('candidate_id',DB::raw('COUNT(candidate_id) as count'))
                             ->groupBy('candidate_id')
                             ->orderBy('id','asc')
                             ->get();
  
        return view('admin-view.ranking.ranking',compact('voteCountList'));
    }
}
