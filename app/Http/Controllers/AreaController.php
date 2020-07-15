<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\area;


class AreaController extends Controller
{

    public function saveArea(Request $request){
        $request->validate([
            'area_name'=>'required',
            'city_name'=>'required',
        ]); 

        $area = new area;
        $area->area_name = $request->area_name;
        $area->city_name = $request->city_name;
        $area->save();
        return response()->json('successfully save'); 
    }

    public function updateArea(Request $request){
        $request->validate([
            'area_name'=>'required',
            'city_name'=>'required',
        ]);
        
        $area = area::find($request->id);
        $area->area_name = $request->area_name;
        $area->city_name = $request->city_name;
        $area->save();
        return response()->json('successfully update'); 
    }

    public function Area(){
        $area = area::all();
        return view('area',compact('area'));
    }
    public function editArea($id){
        $area = area::find($id);
        return response()->json($area); 
    }
    
    public function deleteArea($id){
        $area = area::find($id);
        $area->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }




}
