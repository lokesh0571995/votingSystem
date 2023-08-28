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

class AdminController extends Controller
{

    public function dashboard(){

        return view('admin-view/dashboard');

    }

    public function login()
    {
        return view('admin-view/login');
    }

    public function createLogin(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                
                    'email'      => 'required|email|max:250',
                    'password'   => 'required|min:8',
                
                ]);
        
                if($validator->fails()){
                    return response()->json(['Errors.', $validator->errors()],422);           
                }

                // Throttle the login attempts…
                Log::info('add login rate limiter!');


                $this->middleware('throttle:60,1')->only('login');
 
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

                    $user  = Auth::user(); 
                   
                    if($user->user_type ='Admin'){
                       
                        return redirect()->intended('admin/dashboard');
                    }
                    
                } 
                else{ 
                    return redirect()->to('admin/login')->with(['success'=>'Email or Password is wrong!']); 
                } 

              
            }catch (\Exception $e) {
              
                return redirect()->to('admin/login')->with(['success'=>'User not found!']); 
            }    
    }

    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect()->to('admin/login')->with(['success'=>'Admin logout successfully!']); 
    }

    public function edit($id){
        $user = User::where('id', base64_decode($id))->first();
        return view('admin-view.admin.profile',compact('user'));
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
        return view('admin-view.admin.change_password',compact('user'));
    }

    public function updatePassword(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);

        $admin = User::where('id',base64_decode($id))->where('user_type','Admin')->first();
        $admin->password = bcrypt($request['password']);
        $admin->save();
        return redirect()->back()->with("success", "Password updated successfully!");
       
    }
}
