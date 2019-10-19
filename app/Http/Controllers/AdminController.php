<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                //echo "Successful";die;
                return redirect('admin/dashboard');
            }
            else {
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }

        }
        return view('admin.admin_login');
    }

    public function dashboard(){

        return view('admin.dashboard');
    }
    public function logout(){

        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');
    }
}
