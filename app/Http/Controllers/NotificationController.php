<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\push_notification;


class NotificationController extends Controller
{

    public function saveNotification(Request $request){
        $request->validate([
            'title'=>'required',
        ]);

        $push_notification = new push_notification;
        $push_notification->title = $request->title;
        $push_notification->description = $request->description;
        $push_notification->status = 1;
        $push_notification->save();
        return response()->json('successfully save'); 
    }

    public function updateNotification(Request $request){
        $request->validate([
            'title'=> 'required',
        ]);
        
        $push_notification = push_notification::find($request->id);
        $push_notification->title = $request->title;
        $push_notification->description = $request->description;
        $push_notification->save();
        return response()->json('successfully update'); 
    }

    public function Notification(){
        $push_notification = push_notification::all();
        return view('push_notification',compact('push_notification'));
    }

    public function editNotification($id){
        $push_notification = push_notification::find($id);
        return response()->json($push_notification); 
    }
    
    public function deleteNotification($id){
        $push_notification = push_notification::find($id);
        $push_notification->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }





}
