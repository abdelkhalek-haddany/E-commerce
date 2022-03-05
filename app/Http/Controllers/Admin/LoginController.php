<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function  getLogin(){
        return view('admin.auth.login');
    }
    public function save(){

        $admin = new Admin();
        $admin -> name ="Abdelkhalek haddany";
        $admin -> email ="haddany@gmail.com";
        $admin -> password = bcrypt("123456");
        $admin -> save();
    }

    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;
        $LoginInfo= array('email' => $request->email,'password' => $request->password);
        
        if (auth()->guard('admin')){
            Auth::attempt($LoginInfo,$remember_me);
            //notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }
            //notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => __('admin/messages.data_error')]);
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect()->route('route');
    }
}

