<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Storage;
use Validator;
use Session;
use Log;
use DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidateList = Candidate::orderBy('id','desc')->get();

        return view('admin-view.candidate.index',compact('candidateList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id','desc')->get();
        return view('admin-view.candidate.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|min:2|max:100',
            // 'description'   => 'required|min:2|max:250',
            'category_id'   => 'required',
            'image'         => 'required|image|mimes:png,jpeg,jpg,mov,gif,pdf',

        ]);

        $candidate = new Candidate();
        $candidate->name        = $request->name;
        $candidate->description = $request->category_id;
        // $candidate->description = $request->description;
        $candidate->image       = $this->upload('candidate/', 'png', $request->file('image'));
        $candidate->save();

        return redirect('admin/candidate/index')->with('success', 'Candidate added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::where('id',base64_decode($id))->first();

        return view('admin-view.candidate.view',compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('id','desc')->get();
        $candidate = Candidate::where('id',base64_decode($id))->first();
        return view('admin-view.candidate.edit',compact('candidate','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'          => 'required|min:2|max:100',
            // 'description'   => 'required|min:2|max:250',
            'category_id'   => 'required',
            'image'         => 'nullable|image|mimes:png,jpeg,jpg,mov,gif,pdf',

        ]);

        $candidate = Candidate::where('id',base64_decode($id))->first();
        $candidate->name        = $request->name;
        $candidate->category_id = $request->category_id;
        // $candidate->description = $request->description;
        $candidate->image       = $request->has('image') ? $this->updateImage('candidate/', $candidate->image, 'png', $request->file('image')) : $candidate->image;
        $candidate->save();

        return redirect('admin/candidate/index')->with('success', 'Candidate updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::where('id',base64_decode($id))->first();
        if (Storage::disk('public')->exists('candidate/' . $candidate['image'])) {
            Storage::disk('public')->delete('candidate/' . $candidate['image']);
        }
        $candidate->delete();

        return redirect()->back()->with(['success'=>'Candidate removed successfully!']);
    }


   //upload image

    public static function upload(string $dir, string $format, $image = null)
    {
        if ($image != null) {
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($image));
        } else {
            $imageName = 'def.png';
        }

        return $imageName;
    }
   
    //update image
    public function updateImage(string $dir, $old_image, string $format, $image = null)
    {
        if (Storage::disk('public')->exists($dir . $old_image)) {
            Storage::disk('public')->delete($dir . $old_image);
        }
        $imageName = $this->upload($dir, $format, $image);
        return $imageName;
    }
}
