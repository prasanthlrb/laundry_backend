<?php

namespace App\Http\Controllers;

use App\item;
use App\agent;
use App\customer;
use App\order;
use App\order_item;
use App\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PDF;
use DB;

class ReportController extends Controller
{

    public function viewOrderReport(){
        $agent = agent::all();
        $service = service::all();
        $customer = customer::all();
        return view('orderReport',compact('agent','service','customer'));
    }

public function getOrderReport(Request $request){
    $customer = customer::all();

    $fdate = date('Y-m-d',strtotime($request->from_date));
    $tdate = date('Y-m-d',strtotime($request->to_date));

    $q =DB::table('orders as o');
if ( Input::has('from_date') && !empty(Input::get('from_date')) && Input::has('to_date') && !empty(Input::get('to_date')) )
{
    $q->whereBetween('o.date', [$fdate, $tdate]);
}
elseif ( Input::has('from_date') && !empty(Input::get('from_date')) )
{
    $q->where('o.date', $fdate);
}
elseif ( Input::has('to_date') && !empty(Input::get('to_date')) )
{
    $q->where('o.date', $tdate);
}

if (Input::has('customer') && !empty(Input::get('customer')))
{
    $q->where('o.customer_id',Input::get('customer'));
}
if (Input::has('status') && !empty(Input::get('status')))
{
    $q->where('o.status',Input::get('status'));
}
//     $q->join('order_items as oi', 'o.id', '=', 'oi.order_id');
//     //$q->join('suppliers as s', 'd.supplier_id', '=', 's.id');
//     $q->select('o.*','oi.order_id','oi.service_id','oi.price','oi.qty');
// if (Input::has('service') && !empty(Input::get('service')))
// {
//     $q->where('oi.service_id',Input::get('service'));
// }

    //$q->where('star',$array);
    //$q->where('role',0);
    $data = $q->get();
    //return response()->json($data);

    $pdf = PDF::loadView('orderReportpdf', compact('customer','data','fdate','tdate'));
    $pdf->setPaper('Legal', 'landscape');
    return $pdf->stream('report.pdf');
}

}
