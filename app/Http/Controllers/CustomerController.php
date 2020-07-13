<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\manage_address;
use Hash;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Validator;
use Mail;

class CustomerController extends Controller
{
    public function viewCustomer(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        return view('customer',compact('role_get'));
    }
    public function manageAddress($id){
        $address = DB::table('manage_addresses')
                ->select('*')
                ->where('customer_id','=',$id)
                ->get();
        return view('address',compact('address'));
    }
    public function editAddress($id){
        $manage_address = manage_address::find($id);
        return response()->json($manage_address);
    }

    public function getCustomer(){
        $customer = customer::all();
        // return Datatables::of($customer)->addIndexColumn()->make(true);
        return Datatables::of($customer)
            ->addColumn('action', function ($customer) {
    return '<td class="text-center">
            <span class="dropdown">
              <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">            
                <a href="javascript:void(null)" onclick="Edit(' . $customer->id . ')" class="dropdown-item"><i class="ft-edit"></i> Edit</a>
                <a href="/manage-address/' . $customer->id . '" class="dropdown-item">Manage Address</a>
              </span>
            </span>
            </td>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function createCustomer(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email'=>'required|email|max:255|unique:customers',
            'mobile' => 'required|max:10|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);
        $randomid = mt_rand(100000,999999); 
        
        $customer = new customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->token_id = $randomid;
        $customer->password = Hash::make($request->password);
        $customer->save();
        return response()->json(['message' => 'Successfully Save','customer_id'=>$customer->id], 200);
    }

    public function updateCustomer(Request $request){
        $customer = customer::find($request->customer_id);
        if(isset($request->name)){
            $customer->name = $request->name;
        }
        if(isset($request->email)){
            $request->validate([
            'email' => 'required|unique:customers,email,'.$request->customer_id,
            ]);
            $customer->email = $request->email;
        }
        if(isset($request->mobile)){
            $request->validate([
            'mobile' => 'required|unique:customers,mobile,'.$request->customer_id,
            ]);
            $customer->mobile = $request->mobile;
        }
        if(isset($request->password)){
            $customer->password = Hash::make($request->password);
        }
        $customer->save();
        return response()->json(['message' => 'Successfully Update'], 200);
    }

    public function editCustomer($id){
        $customer = customer::find($id);
        return response()->json($customer);
    }

    public function deleteCustomer($id){
        customer::find($id)->delete();
        return response()->json(['message' => 'Successfully Delete'], 200);
    }

    public function forgetPassword(Request $request){
        $customer = customer::find($request->customer_id);

        $randomid = mt_rand(100000,999999); 
        $customer->unique_id = $randomid;
        $customer->save();

        Mail::send('forgetpasswordmail',compact('randomid'),function($message) use($randomid){
            $message->to('aravind.0216@gmail.com')->subject('Change Request Password');
            $message->from('aravind.0216@gmail.com','Laundry Website');
        });

        return response()->json(['message' => 'Successfully Send'], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        
        $customer = customer::find($requesr->customer_id);
        $customer->password = Hash::make($request->get('password'));
        $customer->save();
                
        return response()->json(['message' => 'Successfully Reset'], 200);
    }

}
