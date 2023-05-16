<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rakib;

class RakibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.pages.rakib.add");
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
        $rakib = new Rakib;
        $rakib->name =  $request->name;
        $rakib->price =  $request->price;
        $rakib->quantity =  $request->quantity;
        $rakib->des =  $request->des;
        $rakib->status =  $request->status;
        $rakib->save();
        return response()->json([
            "msg" => "Data submited"
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
        $rakib = Rakib::all();
        return response()->json([
          "alldata" => $rakib
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function active($id)
    {
        $rakib = Rakib::find($id);
        $rakib->status = "2";
        $rakib->update();
        return response()->json([
            "msg" => "Status Updated"
        ]);
    }
    public function inactive($id)
    {
        $rakib = Rakib::find($id);
        $rakib->status = "1";
        $rakib->update();
        return response()->json([
            "msg" => "Status Updated"
        ]);
    }

    public function delete($id){
        $rakib = Rakib::find($id);
        $rakib->delete();
        return response()->json([
            "msg" => "Data Deleted"
        ]);

    }
}
