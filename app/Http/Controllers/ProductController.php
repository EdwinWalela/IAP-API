<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ['products'=>$products];
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = slug($request->name);
        $product->barcode = $request->barcode;
        $product->photo = $request->photo;
        $product->description = $request->description;
        $product->price = floatval($request->price);
        $product->stock = intval($request->stock);
        $product->store_id = intval($request->store_id);
        
        try{
            $product->save();
            return ["msg"=>"new record created"];
        }catch(Exception $ex){
            abort(500,"Failed to create record");
        }
        
    }

    public function show($id)
    {
        
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