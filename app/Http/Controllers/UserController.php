<?php

namespace App\Http\Controllers;
use App\User;
use App\role;

use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $user = User::all();
        $role = role::all();
        return view('userList',compact('user','role','role_get'));
    }

    public function UserSave(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:Users',
            'role_id'=>'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make ( $request->get ( 'password' ) );
        $user->save();
        return response()->json($user); 
    }
   
    public function UserEdit($id){
        $user = User::find($id);
        return response()->json($user); 
    }

    public function UserUpdate(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:Users,email,'.$request->id,
            'role_id'=>'required',
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        if($request->newpassword != ""){
        $user->password = Hash::make ( $request->get ( 'newpassword' ) );
        }
        $user->save();
        return response()->json($user);
    }

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['message'=>'Successfully Delete'],200);
    }


    public function viewRole(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $role = role::all();
        //return response()->json($role); 
        return view('role',compact('role','role_get'));
    }

    public function roleSave(Request $request){
        $request->validate([
            'role_name'=>'required',
        ]);
        $role = new role;
        $role->role_name = $request->role_name;
        $role->category_read = $request->category_read;
        $role->category_edit = $request->category_edit;
        $role->category_del = $request->category_del;
        $role->services_read = $request->services_read;
        $role->services_edit = $request->services_edit;
        $role->services_del = $request->services_del;
        $role->customer_read = $request->customer_read;
        $role->customer_edit = $request->customer_edit;
        $role->customer_del = $request->customer_del;
        $role->user_read = $request->user_read;
        $role->user_edit = $request->user_edit;
        $role->user_del = $request->user_del;
        $role->role_read = $request->role_read;
        $role->role_edit = $request->role_edit;
        $role->role_del = $request->role_del;
        $role->order_read = $request->order_read;
        $role->order_edit = $request->order_edit;
        $role->order_del = $request->order_del;
        $role->coupon_read = $request->coupon_read;
        $role->coupon_edit = $request->coupon_edit;
        $role->coupon_del = $request->coupon_del;
        $role->agent_read = $request->agent_read;
        $role->agent_edit = $request->agent_edit;
        $role->agent_del = $request->agent_del;
        $role->slider_read = $request->slider_read;
        $role->slider_edit = $request->slider_edit;
        $role->slider_del = $request->slider_del;
        $role->order_report = $request->order_report;
        $role->save();
        return response()->json($role); 
    }
   
    public function roleEdit($id){
        $role = role::find($id);
        return response()->json($role); 
    }

    public function roleUpdate(Request $request){
        $request->validate([
            'role_name'=>'required',
        ]);
        $role = role::find($request->id);
        $role->role_name = $request->role_name;
        $role->category_read = $request->category_read;
        $role->category_edit = $request->category_edit;
        $role->category_del = $request->category_del;
        $role->services_read = $request->services_read;
        $role->services_edit = $request->services_edit;
        $role->services_del = $request->services_del;
        $role->customer_read = $request->customer_read;
        $role->customer_edit = $request->customer_edit;
        $role->customer_del = $request->customer_del;
        $role->user_read = $request->user_read;
        $role->user_edit = $request->user_edit;
        $role->user_del = $request->user_del;
        $role->role_read = $request->role_read;
        $role->role_edit = $request->role_edit;
        $role->role_del = $request->role_del;
        $role->order_read = $request->order_read;
        $role->order_edit = $request->order_edit;
        $role->order_del = $request->order_del;
        $role->coupon_read = $request->coupon_read;
        $role->coupon_edit = $request->coupon_edit;
        $role->coupon_del = $request->coupon_del;
        $role->agent_read = $request->agent_read;
        $role->agent_edit = $request->agent_edit;
        $role->agent_del = $request->agent_del;
        $role->slider_read = $request->slider_read;
        $role->slider_edit = $request->slider_edit;
        $role->slider_del = $request->slider_del;
        $role->order_report = $request->order_report;
        $role->save();
        return response()->json($role);
    }

    public function roleDelete($id){
        $role = role::find($id);
        $role->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

}
