<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agent;
use App\customer;
use App\order;
use App\service;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){

    $cfdate = date('Y-m-d',strtotime('first day of this month'));
    $cldate = date('Y-m-d',strtotime('last day of this month'));
    
    $pfdate = date('Y-m-d',strtotime('first day of previous month'));
    $pldate = date('Y-m-d',strtotime('last day of previous month'));

    $current_total = DB::table("orders")->whereBetween('date', [$cfdate, $cldate])->get()->sum("total");

    $previous_total = DB::table("orders")->whereBetween('date', [$pfdate, $pldate])->get()->sum("total");

        $drivers_count = agent::all()->count();
        $service_count = service::all()->count();
        $customer_count = customer::all()->count();
        $orders_count = order::all()->count();

    $services = DB::table('order_items')
    ->select(DB::raw('count(*) as s_id'))
    ->whereBetween('date', [$cfdate, $cldate])
    ->groupBy('item_id')
    ->get();


        return view('dashboard',compact('drivers_count','service_count','customer_count','orders_count','current_total','previous_total'));
    }
}
