<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    
    public function login(){
        return view('shop/pages/auth.login');
    }
    public function register(){
        return view('shop/pages/auth.register');
    }

    public function Storeregister(Request $request){
            return User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'birth_day' => $request->birth_day,
                'gender'=> $request->gender,
                'is_subscribe'=> $request->is_subscribe,
                'last_login'=> now(),
                'receive_offers'=> $request->receive_offers,
            ]);
            return route('login');
    }

    public function Checklogin(Request $request){

        $remember_me = $request->has('remember_me') ? true : false;
        $LoginInfo= array('email' => $request->email,'password' => $request->password);
        
        if (auth()->guard('admin')){
            Auth::attempt($LoginInfo,$remember_me);
            //notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }
            //notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
}
