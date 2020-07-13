<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use Hash;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use Validator;
use Mail;
use App\home_slider;
use App\category;
use App\manage_address;
use App\schedule;
use App\week;
use App\order;
use App\service;
use App\order_item;
use App\item;
use App\agent;
use App\coupon;
use App\city;
use App\area;
class ApiController extends Controller
{
    public function createCustomer(Request $request){
        try{
            $exist = customer::where('email',$request->email)->get();
            if(count($exist)>0){
                 return response()->json(['message' => 'this Email Address Already Registered','status'=>403], 403);
            }
            $randomid = mt_rand(100000,999999); 
            $customer = new customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->mobile = $request->mobile;
            $customer->token_id = $randomid;
            $customer->password = Hash::make($request->password);
            $customer->save();
            return response()->json(
                ['message' => 'Register Successfully',
                'customer_name'=>$customer->name,
                'customer_email'=>$customer->email,
                'customer_mobile'=>$customer->mobile,
                'customer_id'=>$customer->id],
                 200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
}
    }

    public function customerLogin(Request $request){
        $exist = customer::where('email',$request->email)->get();
        if(count($exist)>0){
                if(Hash::check($request->password,$exist[0]->password)){
                    return response()->json(['message' => 'Login Successfully','customer_name'=>$exist[0]->name,
                'customer_email'=>$exist[0]->email,
                'customer_mobile'=>$exist[0]->mobile,
                'customer_id'=>$exist[0]->id,'status'=>200], 200);
                }else{

                    return response()->json(['message' => 'Records Does not Match','status'=>403], 403);
                }
            }else{
                return response()->json(['message' => 'this Email Address Not Registered','status'=>403], 403);
            }
    }

       public function forgetPassword(Request $request){
        try{
            $exist = customer::where('email',$request->email)->get();
        //return response()->json(count($exist));
        if(count($exist)>0){
        $customer = customer::find($exist[0]->id);
        $randomid = mt_rand(100000,999999);
        $customer->unique_id = $randomid;
        $customer->save();

        // Mail::send('forgetpasswordmail',compact('customer'),function($message) use($customer){
        //     $message->to($customer->email)->subject('Change Password Request');
        //     $message->from('aravind.0216@gmail.com','Hang Your Cloths');
        // });

        return response()->json(['message' => 'Successfully Send','_id'=>$customer->id], 200);
            }else{
                return response()->json(['message' => 'this Email Address Not Registered','status'=>403], 403);
            }
        
        }catch (\Exception $e) {
            return response()->json(['message' => 'this Email Address Not Registered()','status'=>200], 200);
}
    }

     public function resetPassword(Request $request)
    {
        // $request->validate([
        //     'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        //     'password_confirmation' => 'min:6'
        // ]);
        
        if($request->customer_id !=null){
            $customer = customer::find($request->customer_id);
            if($customer->unique_id == $request->code){
                $customer->password = Hash::make($request->get('password'));
                $customer->save();
                return response()->json(['message' => 'Successfully Reset'], 200);
            }else{
                return response()->json(['message' => 'Verification Code Not Valid','status'=>400], 400);
            }
        }else{
            return response()->json(['message' => 'Customer id not found'], 400);
        }
                
    }
     public function getApiSlider(){
        $data = home_slider::orderBy('position','asc')->select('image','title','text')->get();
        return response()->json($data); 
    }
       public function getApiCategory(){
         $category = category::select('title_1','image','time','banner','content')->get();
         return response()->json($category); 
    }

    public function ManageAddress(Request $request){
        try{
        $ma = new manage_address;
        $ma->map_title = $request->map_title;
        $ma->addr_type = $request->addr_type;
        $ma->addr_title = $request->addr_title;
        $ma->address1 = $request->address1;
        $ma->address2 = $request->address2;
        $ma->phone = $request->phone;
        $ma->lat = $request->lat;
        $ma->lng = $request->lng;
        $ma->city = $request->city;
        $ma->area = $request->area;
        $ma->customer_id = $request->customer_id;
        $ma->save();
        return response()->json(['message' => 'Address Store Successfully',], 200);
         }catch (\Exception $e) {
            return response()->json(['message' => ' Server Busy','status'=>400], 400);
}
    }
     public function getAddress($id){
         $addr = manage_address::where('customer_id',$id)->select('map_title','addr_type','addr_title','address1','address2','id','lat','lng','phone','city','area')->get();
         return response()->json($addr);
     }

     public function updateData($id){
         $addr = manage_address::where('customer_id',$id)->get();
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
                'days' => date('M d', strtotime($today)),
                );
            }
        }
        foreach ($week as $key => $value) {
            if($tomorrow == $value->weeks){
                $weeks = "Tomorrow";
                $data[] = array(
                'id' => $value->id,
                'weeks' => $weeks,
                'days' => date('M d', strtotime($tomorrow)),
                );
            }           
        }
        foreach ($week as $key => $value) {
            if($third == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                'days' => date('M d', strtotime($third)),
                );
            }
        }
        foreach ($week as $key => $value) {
            if($four == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                'days' => date('M d', strtotime($four)),
                );
            }
        }
        foreach ($week as $key => $value) {
            if($five == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                'days' => date('M d', strtotime($five)),
                );
            }
        }
        foreach ($week as $key => $value) {
            if($six == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                'days' => date('M d', strtotime($six)),
                );
            }
        }
        foreach ($week as $key => $value) {
            if($seven == $value->weeks){
                $data[] = array(
                'id' => $value->id,
                'weeks' => $value->weeks,
                'days' => date('M d', strtotime($seven)),
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
                    'id' => $value->id,
                    'from_time' => $value->from_time,
                    'to_time' => $value->to_time,
                );   
            }
        }
        return response()->json($data); 
    }

    public function updateCustomer(Request $request){
        $customer = customer::find($request->id);
        $customer->name = $request->customer_name;
        $customer->password = Hash::make($request->password);
        $customer->save();
         return response()->json(['message' => 'Update Successfully',], 200);
    }
        public function updateAddress(Request $request){
        try{
        $ma =  manage_address::find($request->addr_id);
        $ma->map_title = $request->map_title;
        $ma->addr_type = $request->addr_type;
        $ma->addr_title = $request->addr_title;
        $ma->address1 = $request->address1;
        $ma->address2 = $request->address2;
        $ma->phone = $request->phone;
        $ma->lat = $request->lat;
        $ma->lng = $request->lng;
        $ma->city = $request->city;
        $ma->area = $request->area;
        $ma->save();
        return response()->json(['message' => 'Address Update Successfully',], 200);
         }catch (\Exception $e) {
            return response()->json(['message' => ' Server Busy','status'=>400], 400);
}


}
    public function deleteAddress(Request $request){
    manage_address::find($request->addr_id)->delete();
    return response()->json(['message' => 'Address Delete Successfully',], 200);
    }

    public function order(Request $request){
        $order = new order;
        $order->customer_id = $request->customer_id;
        $order->address_id = $request->address_id;
        $order->delivery_option = $request->delivery_option;
        $order->pickup_date = $request->pickup_date;
        $order->pickup_time = $request->pickup_time;
        $order->total = $request->total;
        $order->coupon_value = $request->coupon_value;
        $order->coupon_code = $request->coupon_code;
        $order->coupon_id = $request->coupon_id;
        $order->remark = $request->remark;
        $order->save();
        return response()->json(['message' => 'Order Placed Successfully','order_id'=>$order->id], 200);
    }
    public function getOrder($id){
        $order = order::where('customer_id',$id)->select('id as order_id','status','pickup_date','pickup_time')->orderBy('id','desc')->get();
        return response()->json($order);
    }
    public function getOrderDetails($id){
        $order = order::find($id);
        $address = manage_address::find($order->address_id);
        $data = array(
            'pickup_date'=>$order->pickup_date,
            'pickup_time'=>$order->pickup_time,
            'delivery_option'=>$order->delivery_option,
            'order_id'=>$order->id,
            'map_title'=>$address->map_title,
            'addr_title'=>$address->addr_title,
            'address1'=>$address->address1,
            'city'=>$address->city,
            'area'=>$address->area,
            'status'=>$order->status,
            'coupon_value'=>$order->coupon_value,
            'payment_status'=>$order->payment_status,
        );
        return response()->json($data);
    }

    public function getAddressDetails($id){
        $address = manage_address::find($id);
        $data = array(
            'map_title'=>$address->map_title,
            'addr_title'=>$address->addr_title,
            'addr_type'=>$address->addr_type,
            'address1'=>$address->address1,
        );
        return response()->json($data);
    }

    public function service($id){
        //$service = service::where('cat_id',$id)->select('name','price_1','price_2','image')->get();
        $service =DB::table('services as s')
                ->join('items as i', 's.item_id', '=', 'i.id')
                ->where('s.cat_id',$id)
                ->select('name','image','price_1','price_2')
                ->get();
        //$service = service::where('cat_id',$id)->get();
        return response()->json($service);
    }
    public function orderItem($id){
        $order_item = order_item::where('order_id',$id)->select('item_id','qty','total')->get();
        return response()->json($order_item);
    }
    //agent item list

    public function agentItem(){
        $item = item::select('id','name')->get();
        return response()->json($item);
    }

    public function getService($id,$item){

        //$service = service::where('cat_id',$id)->where('item_id',$service)->select('id','item_id','price_1','price_2')->get();

        $service = service::where('item_id',$item)->select('id','item_id','price_1','price_2','cat_id')->orderBy('cat_id','asc')->get();
           $data = array(
                'item_id'=>$item,
                'dryclean_price'=>null,
                'wash_price'=>null,
                'iron_price'=>null,
            );
        if($id == 'express'){

            foreach($service as $key => $row){
                if($key+1 ==1){
                    $data['dryclean_price'] = $row->price_2;
                }else if($key+1 ==2){
                     $data['wash_price'] = $row->price_2;
                }else{
                    $data['iron_price'] = $row->price_2;
                }
            }

        }else{
               foreach($service as $key => $row){
                if($key+1 ==1){
                    $data['dryclean_price'] = $row->price_1;
                }else if($key+1 ==2){
                     $data['wash_price'] = $row->price_1;
                }else{
                    $data['iron_price'] = $row->price_1;
                }
            }
        }
        return response()->json($data);
    }
      public function agentLogin(Request $request){
        $exist = agent::where('email',$request->email)->get();
        //return response()->json($request);
        if(count($exist)>0){
                if(Hash::check($request->password,$exist[0]->password)){
                    return response()->json(['message' => 'Login Successfully','driver_name'=>$exist[0]->name,
                'agent_id'=>$exist[0]->id,'status'=>200], 200);
                }else{

                    return response()->json(['message' => 'Records Does not Match','status'=>403], 403);
                }
            }else{
                return response()->json(['message' => 'this Email Address Not Registered','status'=>403], 403);
            }
    }

    public function getPickupOrder(){
         $orders =DB::table('orders as o')
                ->join('manage_addresses as ma', 'o.address_id', '=', 'ma.id')
                ->join('customers as c', 'o.customer_id', '=', 'c.id')
                ->where('o.status',0)
                ->select('c.name','ma.addr_type','ma.addr_title','ma.address1','o.id','ma.map_title')
                ->get();
                return response()->json($orders);
    }
    public function getDeliveryOrder(){
         $orders =DB::table('orders as o')
                ->join('manage_addresses as ma', 'o.address_id', '=', 'ma.id')
                ->join('customers as c', 'o.customer_id', '=', 'c.id')
                ->where('o.status',4)
                ->select('c.name','ma.addr_type','ma.addr_title','ma.address1','o.id','ma.map_title')
                ->get();
                return response()->json($orders);
    }

    public function getPickupOrderId($id){
          $orders =DB::table('orders as o')
                ->join('manage_addresses as ma', 'o.address_id', '=', 'ma.id')
                ->join('customers as c', 'o.customer_id', '=', 'c.id')
                ->where('o.id',$id)
                ->select('c.name','ma.addr_type','ma.addr_title','ma.address1','o.id','ma.map_title','c.mobile','ma.lat','ma.lng','o.pickup_date','o.pickup_time','o.delivery_option')
                ->get();
                return response()->json($orders[0]);
    }

    public function addTocart(Request $request){
        $order_item = new order_item;
        $order_item->item_id = $request->item_id;
        $order_item->order_id = $request->order_id;
        $order_item->laundry_price = $request->laundry_price;
        $order_item->dry_clean_price = $request->dry_clean_price;
        $order_item->iron_price = $request->iron_price;
        $order_item->laundry_qty = $request->laundry_qty;
        $order_item->dry_clean_qty =$request->dry_clean_qty;
        $order_item->iron_qty =$request->iron_qty;
        $order_item->total = $request->total;
        $order_item->save();
        $item = order_item::where('order_id',$request->order_id)->select('item_id','laundry_price','dry_clean_price','iron_price','laundry_qty','dry_clean_qty','iron_qty','total')->get();
        return response()->json($item);
    }
    public function orderByItem($id){
           $orders =DB::table('order_items as oi')
                ->join('items as i', 'oi.item_id', '=', 'i.id')
                ->where('oi.order_id',$id)
                ->select('oi.id','i.name','oi.laundry_price','oi.dry_clean_price','oi.iron_price','oi.laundry_qty','oi.dry_clean_qty','oi.iron_qty','oi.total')
                ->get();
                return response()->json($orders);
    }

    public function itemPickup($id){
        $item = order::find($id);
        $item->status =1;
        $item->save();
         return response()->json(['message' => 'Pickup Successful',], 200);
    }
    public function itemDelivery($id){
        $item = order::find($id);
        $item->status =5;
        $item->save();
         return response()->json(['message' => 'Delivery Successful',], 200);
    }

    public function addCartItemList($types){
        $items = item::all();
        $output = array();
        foreach($items as $item){
            $service = service::where('item_id',$item->id)->select('id','item_id','price_1','price_2','cat_id')->orderBy('cat_id','asc')->get();
            if(count($service)>0){
        $data = array(
                'item_id'=>$item->id,
                'item_name'=>$item->name,
                'dryclean_price'=>'-',
                'wash_price'=>'-',
                'iron_price'=>'-',
                'dryclean_qty'=>0,
                'wash_qty'=>0,
                'iron_qty'=>0,
                'total'=>'0'
            );
            if($types == 'express'){
            foreach($service as $key => $row){
                if($key+1 ==1){
                    $data['dryclean_price'] = $row->price_2 == null?'-':$row->price_2;
                }else if($key+1 ==2){
                     $data['wash_price'] = $row->price_2 == null?'-':$row->price_2;
                }else{
                    $data['iron_price'] = $row->price_2 == null?'-':$row->price_2;
                }
            }
        }else{
               foreach($service as $key => $row){
                if($key+1 ==1){
                    $data['dryclean_price'] = $row->price_1 == null?'-':$row->price_1;
                }else if($key+1 ==2){
                     $data['wash_price'] =  $row->price_1 == null?'-':$row->price_1;
                }else{
                    $data['iron_price'] =  $row->price_1 == null?'-':$row->price_1;
                }
            }
        }
        $output[]=$data;
            }
        }

          
  
        return response()->json($output);
    }

    public function addCartItemListAgent($types,$id){
        $items = item::all();
        $output = array();
        foreach($items as $item){
            $service = service::where('item_id',$item->id)->select('id','item_id','price_1','price_2','cat_id')->orderBy('cat_id','asc')->get();
            if(count($service)>0){
        $data = array(
                'item_id'=>$item->id,
                'item_name'=>$item->name,
                'dryclean_price'=>'-',
                'wash_price'=>'-',
                'iron_price'=>'-',
                'dryclean_qty'=>0,
                'wash_qty'=>0,
                'iron_qty'=>0,
                'total'=>'0'
            );
            $order_item = order_item::where('order_id',$id)->where('item_id',$item->id)->get();
            if(count($order_item) >0){
                     $data['dryclean_price'] = $order_item[0]->dry_clean_price;
                     $data['wash_price'] = $order_item[0]->laundry_price;
                     $data['iron_price'] = $order_item[0]->iron_price;
                     $data['wash_qty'] = (int)$order_item[0]->laundry_qty;
                     $data['iron_qty'] = (int)$order_item[0]->iron_qty;
                     $data['dryclean_qty'] = (int)$order_item[0]->dry_clean_qty;
                     $data['total'] = $order_item[0]->total;
                    }else{

            if($types == 'express'){
            foreach($service as $key => $row){
                 if($key+1 ==1){
                    $data['dryclean_price'] = $row->price_2 == null?'-':$row->price_2;
                }else if($key+1 ==2){
                     $data['wash_price'] = $row->price_2 == null?'-':$row->price_2;
                }else{
                    $data['iron_price'] = $row->price_2 == null?'-':$row->price_2;

                    }
               
                        }
        }else{
               foreach($service as $key => $row){
                if($key+1 ==1){
                    $data['dryclean_price'] = $row->price_1 == null?'-':$row->price_1;
                }else if($key+1 ==2){
                     $data['wash_price'] =  $row->price_1 == null?'-':$row->price_1;
                }else{
                    $data['iron_price'] =  $row->price_1 == null?'-':$row->price_1;
                }
            }
        }
    }
        $output[]=$data;
            }
        }

          
  
        return response()->json($output);
    }

    public function couponModule($id,$code){
        $coupon = coupon::where('coupon_code',$code)->get();
        if(count($coupon)>0){
            if($coupon[0]->start_date <= date('Y-m-d') && $coupon[0]->end_date >= date('Y-m-d')){
                // return response()->json(['message' => 'Valid Date',], 200);
                if($coupon[0]->user_type ==1){
                    $arraydata=0;
                    foreach(explode(',',$coupon[0]->user_id) as $user1){
                        if($id == $user1){
                            $arraydata=1;
                        }
                   
                        }
                        if($arraydata==0){

                            return response()->json(['message' => 'coupon not valid for you',], 400);
                        }else{
                            if($coupon[0]->limit_per_user !=null){
                                $order_count = order::where('customer_id',$id)->where('coupon_id',$coupon[0]->id)->get();
                                if(count($order_count)< $coupon[0]->limit_per_user){
                                    return response()->json(['coupon_id' => $coupon[0]->id,'min_order_val'=> $coupon[0]->min_order_val,'discount_type'=>$coupon[0]->discount_type,'amount'=>$coupon[0]->amount], 200);
                                }else{
                                    return response()->json(['message' => 'coupon Already Used',], 400);
                                }
                            }

                                return response()->json(['coupon_id' => $coupon[0]->id,'min_order_val'=> $coupon[0]->min_order_val,'discount_type'=>$coupon[0]->discount_type,'amount'=>$coupon[0]->amount], 200);
                        }
                }else{

                }
            }
            return response()->json(['message' => 'coupon expired',], 400);
        }else{
            return response()->json(['message' => 'invalid coupon code',], 500);
        }
    }

    public function city(){
        $cities = city::select('city_name')->get();
        // $data = array();
        // $data[] = "Select City";
        // foreach($cities as $city){
        //     $data[] = $city->city_name;
        // }
        return response()->json($cities);
    }
    public function area($id){
        $area = area::where('city_name',$id)->get();
          $data = array();
        $data[] = array("area_name"=>"Select Area");
        foreach($area as $city){
            $data[] = array("area_name"=>$city->area_name);
        }
        // $area.append('area_name','Select Area');
        return response()->json($data);
    }

}
