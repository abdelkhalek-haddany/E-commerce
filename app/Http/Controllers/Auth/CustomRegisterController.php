<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomRegisterController extends Controller
{

    public $redirectTo = "/";


    public function __construct()
    {
        // $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function register(Request $request)
    {
        $user = new  User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->birth_day = $request->birth_day;
        $user->last_login = $request->last_login;
        $user->receive_offers = $request->receive_offers;
        $user->is_subscribe = $request->is_subscribe;
        $user->email = $request->email;
        $user->last_login = now();
        $user->password = Hash::make($request->password);
        $user->save();

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());


        // $v_code = base64_encode(random_bytes(30));
        // $mail_content = array('code' => $v_code);

        // if ($user) {
        //     Mail::send('User::mail.verifyMail', $mail_content, function ($message) use ($request) {
        //         $message->to($request->email, $request->name)
        //             ->subject('Verify your email address');
        //     });
        // }
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
