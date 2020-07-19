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

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
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
        
    }

    
    public function destroy($id)
    {
    
    }
}
