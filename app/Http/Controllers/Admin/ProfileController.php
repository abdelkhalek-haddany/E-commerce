<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ProfileRequest;
use App\Models\User;
use App\Traits\ImgUpTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ImgUpTrait;
    //
    public function index(){
        try{
        $admin = User::where('id',Auth::id())->get()->first();
        if (!$admin)
        return redirect()->route('profile')->with(['error' => __('admin/messages.not_found')]);

        return view('admin/pages/profile',compact('admin'));
    }catch (\Exception $ex) {
        return redirect()->route('profile')->with(['error' => __('admin/messages.error')]);
    }
    }

    public function update($id, ProfileRequest $request){
        // try{
            $admin = User::find($id);
        $user = User::where('id',$id)->get()->first();
        if (!$admin)
            return redirect()->route('profile')->with(['error' => __('admin/messages.not_found')]);
        $logoName = ($request->logo != null) 
        ? $this->SaveImage($request->logo,'uploads/admins') 
        : $user->logo;

        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name'=>$request->company_name,
            'logo' => $logoName,
            'updated_at'=> now(),
        ]);
        return redirect()->route('profile')->with(['success' => __('admin/messages.updated')]);
    // } catch (\Exception $ex) {
    //     return redirect()->route('profile')->with(['error' => __('admin/messages.error')]);
    // }
}
}