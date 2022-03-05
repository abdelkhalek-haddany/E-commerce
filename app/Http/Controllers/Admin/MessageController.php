<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendMail;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    // the curd controller for messages form

    public function show(Request $request){
        $Messages = Message::orderBy('id','desc')->get();
        return view('admin.pages.messages')->with('Messages',$Messages);
    }
    // delete function for delete the message in database
    public function delete($id){
        $message = Message::find($id);
        if(!$message){
            back()->with('error','sorry this message not exists');
        }else{
            $message->delete();
            return back()->with('success','the messages deleted successefuly');
        }
    }

    // update function for update the reading of message
    public function update_reading($id){
    $find = Message::find($id);
    if(!$find) return back()->with('notfund','sorry this message not found');
    $find->update([
        'isReader'=>"1",
    ]);
    return back()->with(['success','the message updated successefuly']);
    }

    public function update_answering($id){
        $find = Message::find($id);
        if(!$find) return back()->with('notfund','sorry this message not found');
        $find->update([
            'isAnswer'=>"1",
        ]);
    return back()->with(['success','the message updated successefuly']);

        }
    }
