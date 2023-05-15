<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
   public function index(){
    return view("backend.pages.brand.add");
   }

   public function insert(Request $request){
    $brand = new Brand;
    $brand->name = $request->name;
    $brand->des = $request->des;
    $brand->price = $request->price;
    $brand->quantity = $request->quantity;
    $brand->status = $request->status;
    $brand->save();
    return response()->json([
        "msg" => "Data Successfully Submitted"
    ]);
   }

 
}
