<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRquest;
use App\Http\Requests\SubscribersRquest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // the curd controller for messages form


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(Request $request){
        $Subscribers = Subscriber::orderBy('id','desc')->get();
        return view('Admin.pages.subscribers')->with('Subscribers',$Subscribers);
    }

    // the sort function for insert the subscribers in database
    
    public function store(SubscriberRquest $request){
        Subscriber::create([
            'email' => $request->email,
            'created_at'=> now()
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Thank you for joining us'
            ]
        );
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