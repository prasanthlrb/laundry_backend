<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schedule;
use App\week;
use Auth;
use DB;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showWeeks(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $week = week::all();
        return view('week',compact('week','role_get'));
    }

    public function getApiWeeks(){
        $week = week::all();
        $today = date("l");

        $day = date('Y-m-d', strtotime(' +1 day'));

        $tomorrow = date('l', strtotime($day));

        $third1 = date('Y-m-d', strtotime(' +2 day'));
        $third = date('l', strtotime($third1));
        $four1 = date('Y-m-d', strtotime(' +3 day'));
        $four = date('l', strtotime($four1));
        $five1 = date('Y-m-d', strtotime(' +4 day'));
        $five = date('l', strtotime($five1));
        $six1 = date('Y-m-d', strtotime(' +5 day'));
        $six = date('l', strtotime($six1));
        $seven1 = date('Y-m-d', strtotime(' +6 day'));
        $seven = date('l', strtotime($seven1));

        foreach ($week as $key => $value) {
            if($today == $value->weeks){
                $weeks = "Today";
                $data[] = array(
                'id' => $value->id,
                'weeks' => $weeks,
                );
            }
        }
        foreach ($week as $key => $value) {
            if($tomorrow == $value->weeks){
                $weeks = "Tomorrow";
                $data[] = array(
                'id' => $value->id,
                'weeks' => $weeks,
                );
            }           
        }
        foreach ($week as $key => $value) {
            if($third == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                );
            }
        }
        foreach ($week as $key => $value) {
            if($four == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                );
            }
        }
        foreach ($week as $key => $value) {
            if($five == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                );
            }
        }
        foreach ($week as $key => $value) {
            if($six == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                );
            }
        }
        foreach ($week as $key => $value) {
            if($seven == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                );
            } 
        }
        return response()->json($data); 
    }


    public function getApiSchedule($id){
        $schedule = schedule::where('week_id',$id)->get();

        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();

        $time = date("h:i A"); 
        foreach ($schedule as $key => $value) {
            if($time < $value->to_time){
                $data[] = array(
                    'id' => $value->id,
                    'from_time' => $value->from_time,
                    'to_time' => $value->to_time,
                );
            }
            else{
                $data[] = array(
                    'id' => '',
                    'from_time' => '',
                    'to_time' => '',
                );   
            }
        }
        return response()->json($data); 
    }

    public function viewSchedule($id){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $week_id = $id;
        $schedule = schedule::where('week_id',$id)->get();
        return view('schedule',compact('schedule','role_get','week_id')); 
    }

    public function saveSchedule(Request $request){
  
        $schedule = new schedule;
        $schedule->week_id = $request->week_id;
        //$schedule->title = $request->title;
        //$schedule->description = $request->description;
        $schedule->from_time = $request->from_time;
        $schedule->to_time = $request->to_time;
        $schedule->save();
        return response()->json($schedule); 
    }
   
    public function editSchedule($id){
        $schedule = schedule::find($id);
        return response()->json($schedule); 
    }

    public function updateSchedule(Request $request){
        
        $schedule = schedule::find($request->id);
        $schedule->week_id = $request->week_id;
        //$schedule->title = $request->title;
        //$schedule->description = $request->description;
        $schedule->from_time = $request->from_time;
        $schedule->to_time = $request->to_time;
        $schedule->save();
        return response()->json($schedule);
    }

    public function deleteSchedule($id){
        $schedule = schedule::find($id);
        $schedule->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}
