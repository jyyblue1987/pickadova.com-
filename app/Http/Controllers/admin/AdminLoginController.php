<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;

class AdminLoginController extends Controller
{
   

    
    public function adminLogin(Request $request)
    {   
         
        if($request->input('_token')){   

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // echo Hash::make('admin123'); exit();
	        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

	            return redirect()->route('admin_dashboard');
	        }

	        return redirect()->back()->with('message','email and password invalid')->withInput($request->only('email', 'remember'));
        }else{
            return view('admin.login');
        }

    }
}
