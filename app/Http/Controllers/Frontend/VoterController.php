<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Validate;
use Session;

class VoterController extends Controller
{

    public function registration(){

        return view('frontend.voter.register');
    }


    public function postRegistration(Request $request){

        $request->validate([
            'name'      => 'required|min:2|max:100',
            'email'     => 'required|email|unique:users,email|max:250',
            'password'  => 'required|min:8',

        ]);

        $user = new User();
        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->password  = Hash::make($request->password);
        $user->user_type = 'Voter';
        $user->save();

        return redirect('voter/login')->with('success', 'Voter registered successfully!');

    }

    public function createLogin()
    {
        return view('frontend.voter.login');
    }


    public function login(Request $request)
    {
        try {
                $request->validate([
                    'email'      => 'required|email|max:250',
                    'password'   => 'required|min:8',
                
                ]);
        
               
                $this->middleware('throttle:60,1')->only('login');
 
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

                    $user  = Auth::user(); 
                   
                    if($user->user_type =='Voter'){
                       
                        return redirect()->intended('/home')->with(['success'=>'Voter Login successfully!']);
                    }
                    
                } 
                else{ 
                    return redirect()->to('voter/login')->with(['error'=>'Email or Password is wrong!']); 
                } 

              
            }catch (\Exception $e) {
              
                return redirect()->to('voter/login')->with(['error'=>'User not found!']); 
            }    
    }

    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect()->to('/home')->with(['success'=>'Voter logout successfully!']); 
    }


    public function edit($id){
        $user = User::where('id', base64_decode($id))->first();
        return view('frontend.voter.profile',compact('user'));
    }

    public function update(Request $request,$id) {
        $request->validate([
            'name'         => 'required|max:100',
            'email'        => 'required|email|max:100',
            'user_type'    => 'required'
          
        ]);
        $edit_user = User::find(base64_decode($id));
        $edit_user->name = $request->name;
        $edit_user->email = $request->email;
        $edit_user->user_type = $request->user_type;
        $edit_user->save();

        return redirect()->back()->with("success", "Profile updated successfully!");
    }


    public function changePassword($id){
        $user = User::where('id', base64_decode($id))->first();
        return view('frontend.voter.change_password',compact('user'));
    }

    public function updatePassword(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);

        $admin = User::where('id',base64_decode($id))->where('user_type','Voter')->first();
        $admin->password = bcrypt($request['password']);
        $admin->save();
        return redirect()->back()->with("success", "Password updated successfully!");
       
    }

}
