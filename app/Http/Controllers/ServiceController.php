<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\category;
use App\service;
use Auth;
use DB;
class ServiceController extends Controller
{
    //Category View
    public function viewCategory(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
         $category = category::all();
         return view('category',compact('category','role_get'));
    }

    //Category Edit
    public function editCategory($id){
        $category = category::find($id);
        return response()->json($category);
    }

    //category Delete
    public function deleteCategory($id){
        category::find($id)->delete();
        return response()->json(['message' => 'Successfully Delete'], 200);
    }

    //category Update
    public function updateCategory(Request $request){
        $category = category::find($request->id);
        $category->title_1 = $request->title_1;
        $category->title_2 = $request->title_2;
        $category->time = $request->time;
            $category_image = null;
            if ($request->file('image') != "") {
                $image = $request->file('image');
                $category_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('category/'), $category_image);
                $category->image = $category_image;
            }
            $category_banner = null;
            if ($request->file('banner') != "") {
                $banner = $request->file('banner');
                $category_banner = rand() . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('category/'), $category_banner);
                $category->banner = $category_banner;
            }
        $category->save();
 return response()->json(['message' => 'Successfully Update'], 200);
    }

    //Category Create
    public function createCategory(Request $request){
        $category = new category;
        $category->title_1 = $request->title_1;
        $category->title_2 = $request->title_2;
        $category->time = $request->time;
            $category_image = null;
            if ($request->file('image') != "") {
                $image = $request->file('image');
                $category_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('category/'), $category_image);
            }
            $category_banner = null;
            if ($request->file('banner') != "") {
                $banner = $request->file('banner');
                $category_banner = rand() . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('category/'), $category_banner);
            }
        $category->banner = $category_banner;
        $category->image = $category_image;
        $category->save();
 return response()->json(['message' => 'Successfully Save'], 200);
    }

    //end of Category

    //view Service
    public function viewService($id){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $item = item::all();
        $category = category::find($id);
        $service = service::where('cat_id',$id)->get();
        return view('services',compact('service','category','role_get','item'));
    }

    //create Service
    public function createService(Request $request){
        $service = new service;
        $service->item_id = $request->item_id;
        $service->price_1 = $request->price_1;
        $service->duration_1 = $request->duration_1;
        $service->price_2 = $request->price_2;
        $service->duration_2 = $request->duration_2;
        $service->cat_id = $request->cat_id;
        
        $service->save();
        return response()->json(['message' => 'Successfully Save'], 200);
    }

    //update Services
    public function updateService(Request $request){
        $service = service::find($request->id);
        $service->item_id = $request->item_id;
        $service->price_1 = $request->price_1;
        $service->duration_1 = $request->duration_1;
        $service->price_2 = $request->price_2;
        $service->duration_2 = $request->duration_2;
        //$service->cat_id = $request->cat_id;
        
        $service->save();
        return response()->json(['message' => 'Successfully Save'], 200);
    }

    //edit Services
    public function editService($id){
        $service = service::find($id);
        return response()->json($service);   
    }

    //delete Services
    public function deleteService($id){
        service::find($id)->delete();
        return response()->json(['message' => 'Successfully Delete'], 200);
    }


    public function Item(){
        $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->get();
        $item = item::all();
        return view('item',compact('item','role_get')); 
    }

    public function ItemSave(Request $request){
        $request->validate([
            'name'=>'required|unique:items',
        ]);
        $item = new item;
        $item->name = $request->name;
        $item_image = null;
            if ($request->file('image') != "") {
                $image = $request->file('image');
                $item_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('servicess/'), $item_image);
            }
        $item->image = $item_image;
        $item->save();
        return response()->json(['message'=>'Successfully Save'],200);  
    }
   
    public function ItemEdit($id){
        $item = item::find($id);
        return response()->json($item); 
    }

    public function ItemUpdate(Request $request){
        $request->validate([
            'name'=>'required|unique:items,name,'.$request->id,
        ]);
        $item = item::find($request->id);
        $item->name = $request->name;
        $item_image = null;
            if ($request->file('image') != "") {
                $image = $request->file('image');
                $item_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('servicess/'), $item_image);
                $item->image = $item_image;
            }
        $item->save();
        return response()->json(['message'=>'Successfully Update'],200); 
    }

    public function ItemDelete($id){
        $item = item::find($id);
        $item->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    
}
