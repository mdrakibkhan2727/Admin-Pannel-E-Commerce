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
                //Session Checking
                /*Session::put('adminSession',$data['email']);*/
                return redirect('admin/dashboard');
            }
            else {
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }

        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        /*if(Session::has('adminSession')){
        }
        else{
            return redirect('/admin')->with('flash_message_error','Please login First');
        }*/
        return view('admin.dashboard');

    }
    public function logout(){

        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');
    }
}
