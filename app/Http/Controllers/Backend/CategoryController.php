<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.category.add');
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
        $category = new CategoryModel;
        $category->name = $request->name;
        $category->des = $request->des;
        $category->details = $request->details;
        $category->quantity = $request->quantity;
        $category->status = $request->status;
        $category->save();
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = CategoryModel::all();
        return view('backend.pages.category.manage',compact("categories"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryModel::find($id);
        return view('backend.pages.category.edit',compact("category"));
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
        $category = CategoryModel::find($id);
        $category->name = $request->name;
        $category->des = $request->des;
        $category->details = $request->details;
        $category->quantity = $request->quantity;
        $category->status = $request->status;
        $category->update();
        return redirect()->route('showcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destry($id)
    {
        $category = CategoryModel::find($id);
        $category->delete();
        return back();
    }

    //Active and Inactive
    public function active($id){
        $category = CategoryModel::find($id);
        $category->status="2";
        $category->update();
        return back();
    }
    public function inactive($id){
        $category = CategoryModel::find($id);
        $category->status="1";
        $category->update();
        return back();
      }
}
