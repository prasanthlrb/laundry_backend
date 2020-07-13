<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\area;
use App\city;


class AreaController extends Controller
{

    public function saveCity(Request $request){
        $request->validate([
            'city_name'=>'required',
        ]); 
        $city = new city;
        $city->city_name = $request->city_name;
        $city->save();
        return response()->json('successfully save'); 
    }
    public function updateCity(Request $request){
        $request->validate([
            'city_name'=> 'required',
        ]);
        
        $city = city::find($request->id);
        $city->city_name = $request->city_name;
        $city->save();
        return response()->json('successfully update'); 
    }

    public function City(){
        $city = city::all();
        return view('city',compact('area'));
    }
    public function editCity($id){
        $city = city::find($id);
        return response()->json($city); 
    }
    
    public function deleteCity($id){
        $city = city::find($id);
        $city->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }



    public function saveArea(Request $request){
        $request->validate([
            'area'=>'required',
        ]); 

        $area = new area;
        $area->area_name = $request->area_name;
        $area->city_id = $request->city_id;
        $area->save();
        return response()->json('successfully save'); 
    }

    public function updateArea(Request $request){
        $request->validate([
            'area'=> 'required',
        ]);
        
        $area = area::find($request->id);
        $area->area = $request->area;
        $area->city_id = $request->city_id;
        $area->save();
        return response()->json('successfully update'); 
    }

    public function Area($id){
        $area = area::where('city_id',$id)->get();
        return view('admin.area',compact('area','id'));
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
