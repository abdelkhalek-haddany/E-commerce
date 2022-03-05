<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Register $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // public function login(Request $request)
    // {
    //     $user = User::where('email',$request->email)->first();
    //     if(!$user){
    //         return response()->json(['error' => 'user not found.'], 401);
    //     }
        
    //     if (!Hash::check($request->password,$user->password)) {
    //         return response()->json(['error' => 'Unauthorised'], 401);
    //     } else {
    //         auth()->login($user);
    //         $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
    //         return response()->json(['token' => $token], 200);
    //     }
    // }

    // method for user logout and delete token
    // public function logout()
    // {
    //     auth()->user()->tokens()->delete();

    //     return [
    //         'message' => 'You have successfully logged out and the token was successfully deleted'
    //     ];
    // }
}