<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    public function index()
    {
        // Retrieve all stores from db
        $stores = Store::all();
        return ['stores'=>$stores];
    }

    public function store(Request $request)
    {
        $store = new Store();
        $store->name = slug($request->name);
        $store->location = slug($request->location);
        $store->contact = $request->contact;
        $store->latitude = floatval($request->latitude);
        $store->longitude = floatval($request->longitude);
        
        try{
            $store->save();
            return ["msg"=>"new record created"];
        }catch(Exception $ex){
            abort(500,"Failed to create store");
        }
        
    }

    public function show($id)
    {
      $store = Store::where('id',$id)->get();
      return ['store'=>$store[0]];
    }

    public function edit($id)
    {
        

    }
  
    public function update(Request $request, $id)
    {
        $store = Store::where('id',$id)->first();

        $store->name = slug($request->name);
        $store->location = slug($request->location);
        $store->contact = $request->contact;
        $store->latitude = floatval($request->latitude);
        $store->longitude = floatval($request->longitude);
        
        try{
            $store->save();
            return ["msg"=>"record updated"];
        }catch(Exception $ex){
            abort(500,"Failed to create store");
        }
    }
    
    public function destroy($id)
    {
        $store = Store::where('id',$id)->first();
        try{
            $store->delete();
            return["msg"=>"record deleted"];
        }catch(Exception $ex){
            return ["msg"=>"Deletion failed"];
        }
    
    }
}

function slug($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}