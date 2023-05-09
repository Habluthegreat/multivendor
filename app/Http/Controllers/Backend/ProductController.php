<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('backend.pages.product.add');
    }

    public function insert(Request $rqst){
        $product = new Product;
        $product->name = $rqst->name;
        $product->des = $rqst->des;
        $product->price = $rqst->price;
        $product->quantity = $rqst->quantity;
        $product->status = $rqst->status;
        $product->save();
        return back();
    }

    public function show(){
        $products = Product::all();
        return view("backend.pages.product.manage",compact("products"));
    }
}
