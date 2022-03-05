<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    // the curd controller for messages form


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $Subscribers = Subscriber::orderBy('id','desc')->get();
        return view('Admin.pages.subscribers')->with('Subscribers',$Subscribers);
    }

    // the sort function for insert the subscribers in database
    
    public function store(SubscriberRequest $request){
        Subscriber::create([
            'email' => $request->email,
            'created_at'=> now()
        ]);
        return back()->with(['successMsg' => 'thank you for joining you']);
}
    // delete function for delete the message in database
    public function delete($id){
        $message = Subscriber::find($id);
        if(!$message){
            redirect('admin.subscribers')->with('error','sorry this subscriber not exists');
        }else{
            $message->delete();
            return back()->with('success','the subscriber deleted successefuly');
        }
    }
}