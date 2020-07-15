<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\item;
use App\agent;
use App\customer;
use App\order;
use App\order_item;
use App\service;
use App\settings;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use DB;
use AppHelper;
use PDF;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function order(Request $request){
        $order = new order;
        $order->customer_id = $request->customer_id;
        $order->total = $request->total;
        $order->payment_type = $request->payment_type;
        $order->pickup_date = $request->pickup_date;
        $order->pickup_time = $request->pickup_time;
        $order->delivery_date = $request->delivery_date;
        $order->delivery_time = $request->delivery_time;
        $order->address_id = $request->address_id;
        //$order->status = $request->status;
        $order->save();
        $request->order_item = array('service_id'=>1,'qty'=>2,'price'=>9);
        foreach($request->order_item as $item){
            $order_item = new order_item;
            $order_item->order_id = $order->id;
            $order_item->service_id = $item->service_id;
            $order_item->qty = $item->qty;
            $order_item->price = $item->price;
            $order_item->save();
        }
    }

    public function customerAddress(Request $request){
        $manage_address = new manage_address;
        $manage_address->customer_id = $request->customer_id;
        $manage_address->lat = $request->lat;
        $manage_address->lng = $request->lng;
        $manage_address->addr_type = $request->addr_type;
        $manage_address->addr_title = $request->addr_title;
        $manage_address->address1 = $request->address1;
        $manage_address->address2 = $request->address2;
        $manage_address->address3 = $request->address3;
        $manage_address->save();
        return response()->json($manage_address->id);
    }

    public function orders(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $agent = agent::all();
        return view('order',compact('agent','role_get'));
    }

    public function getOrder($filter){
        if ($filter != 6) {
        $orders = DB::table('orders')
         ->where('status','=',$filter)
         ->join('customers', 'orders.customer_id', '=', 'customers.id')
         //->join('agents', 'orders.agent_id', '=', 'agents.id')
         ->select('orders.*','customers.name','customers.mobile')
         ->orderBy('orders.id','desc')
         ->get();
        }else{
        $orders = DB::table('orders')
         ->join('customers', 'orders.customer_id', '=', 'customers.id')
         ->select('orders.*','customers.name','customers.mobile')
         ->orderBy('orders.id','desc')
         ->get();
        }

        return Datatables::of($orders)
            ->addColumn('checkbox', function ($orders) {
                return '<td><input type="checkbox" name="order_checkbox[]" class="order_checkbox" value="' . $orders->id . '"></td>';
            })
            ->addColumn('order_id', function ($orders) {
                return '<a href="/view-order/' . $orders->id . '" >#' . $orders->id . '</a>';
            })
            ->addColumn('payment_status', function ($orders) {
                if ($orders->payment_status == 0) {
                    return '<td>Un Paid</td>';
                } else {
                    return '<td>Paid</td>';
                }
            })
            ->addColumn('order_status', function ($orders) {

                if ($orders->status == 0) {
                    $status = '<b>Pending</b>';
                }
                else if ($orders->status == 1)
                {
                    $status = '<b>Confirmed</b>';
                }
                else if ($orders->status == 2)
                {
                    $status = '<b>Picked Up</b>';
                }
                else if ($orders->status == 3)
                {
                    $status = '<b>In Process</b>';
                }
                else if ($orders->status == 4)
                {
                    $status = '<b>Shipped</b>';
                }
                else if ($orders->status == 5)
                {
                    $status = '<b>Delivered</b>';
                }
                return '<td>
                ' . $status . '
                </td>';
            })
            ->addColumn('customer_details', function ($orders) {
                return '<td>
                <p>' . $orders->name . '</p>
                <p>' . $orders->mobile . '</p>
                </td>';
            })
            ->addColumn('pickup_date', function ($orders) {
                return '<td>
                <p>' . $orders->pickup_date . '</p>
                </td>';
            })
            ->addColumn('agent_details', function ($orders) {
                $agent = agent::find($orders->agent_id);
                if(empty($agent)){
                return '<td>
                <p></p>
                </td>';
                }
                else{
                return '<td>
                <p>' . $agent->name . '</p>
                <p>' . $agent->mobile . '</p>
                </td>';
                }
            })
            ->addColumn('print', function ($orders) {
                return 
                '<td><span class="dropdown">
                  <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                  <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                    
                    <a target="_blank" href="/order-print/'.$orders->id.'" class="dropdown-item"><i class="ft-print"></i> Print</a>
                    <a href="javascript:void(null)" onclick="SendMail('.$orders->id.')" class="dropdown-item"><i class="ft-print"></i> Send Mail</a>

                  </span>
                </span></td>';
            })

            ->rawColumns(['order_id','pickup_date', 'payment_status', 'order_status', 'customer_details','agent_details', 'checkbox','print'])
            ->make(true);

        //return Datatables::of($orders) ->addIndexColumn()->make(true);
    }

    public function addItem($id){
        $order_id = $id;
        $item = item::all();
        $service = service::all();
        $agent = agent::all();
        $category = category::all();
        return view('orderItem',compact('agent','service','order_id','category','item'));
    }

    public function getItemPrice($id){
        $service = service::where('item_id' ,'=', $id)->get();
        return response()->json($service);
    }

    public function viewOrder($id){
        $order = order::find($id);
        $service = service::all();
        $item = item::all();
        $agent = agent::all();
        $customer = customer::find($order->customer_id);
        $order_item = order_item::where('order_id' ,'=', $id)->get();
        return view('viewOrder',compact('agent','service','order','customer','order_item','item'));
    }


    public function saveItem(Request $request){
    $order_id;
    $total = 0;
        for ($x=0; $x<count($_POST['item']); $x++)
        {
            $order_item = new order_item;
            $order_id = $_POST['order_id'][$x];
            $order_item->date = date('Y-m-d');
            $order_item->order_id = $_POST['order_id'][$x];
            $order_item->item_id = $_POST['item_id'][$x];
            $order_item->qty = $_POST['qty'][$x];
            $order_item->laundry_price = $_POST['laundry_price'][$x];
            $order_item->dry_clean_price = $_POST['dry_clean_price'][$x];
            $order_item->iron_price = $_POST['iron_price'][$x];
            $order_item->express_laundry_price = $_POST['express_laundry_price'][$x];
            $order_item->express_dry_clean_price = $_POST['express_dry_clean_price'][$x];
            $order_item->express_iron_price = $_POST['express_iron_price'][$x];
            $order_item->total = $_POST['total'][$x];
            $total = $_POST['total'][$x];
            $order_item->save();
        }
        $order = order::find($order_id);
        $order->total = $total;
        $order->save();

        return response()->json(["Successfully Stored"], 200);
    }

    public function changeStatus(Request $request)
    {
        if ($request->status != 6) {
            $order = order::whereIn('id', $request->id)->get();
            foreach ($order as $row) {
                $row->status = $request->status;
                $row->save();
            }
        }
        return response()->json(["Successfully Update"], 200);
    }

    public function assignAgent(Request $request){
        $ids = explode(",", $request->id);
        foreach ($ids as $id) {
            $order = order::find($id);
            $order->agent_id = $request->agent;
            $order->save();
        }
    return response()->json(['message' => 'Successfully Save'], 200);
    }

    public function assignAgentview(Request $request){
        $order = order::find($request->id);
        $order->agent_id = $request->agent;
        $order->save();
        return response()->json(['message' => 'Successfully Save'], 200);
    }

    public function changeStatusview(Request $request)
    {
        if ($request->status != 6) {
            $order = order::find($request->id);
            $order->status = $request->status;
            $order->save();
        }
        return response()->json(["Successfully Update"], 200);
    }


    public function OrderPrint($id){
        $order = order::find($id);
        $order_item = order_item::where('order_id',$id)->get();
        $customer = customer::find($order->customer_id);
        $item = item::all();
        $settings = settings::first();


        $pdf = PDF::loadView('pdf.invoicepdf',compact('order','order_item','customer','item','settings'));
        $pdf->setPaper('A4');
        return $pdf->stream('report.pdf');

    }

}
