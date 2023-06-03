<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.brand.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->des = $request->des;
        $brand->price = $request->price;
        $brand->quantity = $request->quantity;
        $brand->status = $request->status;
        $brand->save();
        return response()->json([
            'msg' => 'Data Submitted Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $brand = Brand::all();
        return response()->json([
            "all" => $brand
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return response()->json([
            "all" => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->des = $request->des;
        $brand->price = $request->price;
        $brand->quantity = $request->quantity;
        $brand->status = $request->status;
        $brand->save();
        return response()->json([
            "msg" => "Data Updatetd"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return response()->json([
            "msg" => "deleted"
        ]);
    }
    public function active($id)
    {
        $brand = Brand::find($id);
        $brand->status = "2";
        $brand->update();
        return response()->json([
            "msg" => "status update"
        ]);
    }
    public function inactive($id)
    {
        $brand = Brand::find($id);
        $brand->status = "1";
        $brand->update();
        return response()->json([
            "msg" => "status update"
        ]);
    }
}
