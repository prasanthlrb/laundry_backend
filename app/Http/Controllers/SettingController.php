<?php

namespace App\Http\Controllers;
use App\home_slider;
use App\agent;
use App\settings;
use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use area;
use city;

class SettingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

   

    public function changeSliderOrder(Request $request)
    {
        foreach ($request->value as $key => $value) 
        {
            $position=$key+1;
            $home_slider = home_slider::find($value);
            $home_slider->position = $position;
            $home_slider->save();
        }
        return response()->json(['message'=>'Successfully Update'],200);
    }

    public function homeSlider(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $home_slider = home_slider::orderBy('position','asc')->get();
        return view('homeSlider',compact('home_slider','role_get')); 
    }

    public function sliderSave(Request $request){
	    //image upload
	    $fileName = null;
	    if($request->file('image')!=""){
	    $image = $request->file('image');
	    $fileName = rand() . '.' . $image->getClientOriginalExtension();
	    $image->move(public_path('upload_slider/'), $fileName);
	    }  

        $count = home_slider::count();
        $position = $count + 1;
        $home_slider = new home_slider;
        $home_slider->image = $fileName;
        $home_slider->title = $request->title;
        $home_slider->text = $request->text;
        $home_slider->position = $position;
        $home_slider->save();
        return response()->json(['message'=>'Successfully Store'],200); 
    }

    public function sliderUpdate(Request $request){
        if($request->image!=""){
            $old_image = "upload_slider/".$request->image1;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            //image upload
            $fileName = null;
            if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_slider/'), $fileName);
            }
        }
        else
        {
            $fileName = $request->image1;
        }

        $home_slider = home_slider::find($request->id);
        $home_slider->image = $fileName;
        $home_slider->title = $request->title;
        $home_slider->text = $request->text;
        $home_slider->save();
        return response()->json(['message'=>'Successfully Update'],200); 
    }

    public function sliderEdit($id){
        $home_slider = home_slider::find($id);
        return response()->json($home_slider); 
    }

    public function sliderDelete($id){
        $home_slider = home_slider::find($id);
        $home_slider->delete(); 
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function Agent(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $agent = agent::all();
        return view('agent',compact('agent','role_get')); 
    }

    public function AgentSave(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:agents',
            'mobile'=>'required|unique:agents',
        ]);
        $agent = new agent;
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->mobile = $request->mobile;
        $agent->password = Hash::make ( $request->get ( 'password' ) );
        $agent->save();
        return response()->json($agent); 
    }
   
    public function AgentEdit($id){
        $agent = agent::find($id);
        return response()->json($agent); 
    }

    public function AgentUpdate(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:agents,email,'.$request->id,
            'mobile'=>'required|unique:agents,mobile,'.$request->id,
        ]);
        $agent = agent::find($request->id);
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->mobile = $request->mobile;
        if($request->newpassword != ""){
        $agent->password = Hash::make ( $request->get ( 'newpassword' ) );
        }
        $agent->save();
        return response()->json($agent);
    }

    public function AgentDelete($id){
        $agent = agent::find($id);
        $agent->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function cityModule(){

    }


    public function settings(){
        $data = settings::find('1');
        return view('settings',compact('data'));
    }

    public function updateSettings(Request $request){
        if($request->logo!=""){
            $old_image = "upload_image/".$request->logo;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            //image upload
            $fileName1 = null;
            if($request->file('logo')!=""){
            $image = $request->file('logo');
            $fileName1 = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName1);
            }
        }
        else
        {
            $fileName1 = $request->logo1;
        }

        $settings = settings::find($request->id);
        $settings->name = $request->name;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->city = $request->city;
        $settings->area = $request->area;
        $settings->address = $request->address;
        $settings->pincode = $request->pincode;
        $settings->vat_number = $request->vat_number;
        $settings->shop_license_code = $request->shop_license_code;
        $settings->shop_address = $request->shop_address;
        $settings->logo = $fileName1;
        $settings->save();
        return back();
    }

}
