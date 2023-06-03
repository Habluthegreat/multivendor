<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\Brandimage;
use App\Models\Brandgallery;
use Image;

class BrandimageController extends Controller
{
    public function index()
    {
        $cats = CategoryModel::all();
        return view("backend.pages.brandimg.add", compact("cats"));
    }




    public function store(Request $rqst)
    {   
        $bra = new Brandimage;
        $rqst->validate([ 
            'name' => 'required',
            'cat_id'=> 'required'
        ]);
        
        if($rqst->img){
            $image = $rqst->file('img');
            $customName = rand().".". $image->getClientOriginalExtension();
            $location = public_path("backend/assets/images/brand/".$customName);
            Image::make($image)->resize(150,200 )->save($location);
        
        }
        
        $bra->name = $rqst->name;
        $bra->cat_id = $rqst->cat_id;
        $bra->img = $customName;
        $bra->save();
            //for recent brand id and multiple image
            $brandId = Brandimage::where('name', $rqst->name)->first();
            if($rqst->images)
            {
                $images = $rqst->file('images');
                foreach($images as $imge)
                {
                    $brandGallery = new Brandgallery;
                    $customName = rand().".". $imge->getClientOriginalExtension();
                    $location= public_path("backend/assets/images/brand/gallery/".$customName);
                    Image::make($imge)->resize(100, 100)->save($location);
                    
                    $brandGallery->brand_id = $brandId->id;
                    $brandGallery->images = $customName;
                    $brandGallery->save();
                }
               


            }

        return back();
    }
    public function show()
    {
        $brands = Brandimage::all();
        $cats = CategoryModel::all();
        return view("backend.pages.brandimg.manage", compact("brands", "cats"));
    }
    public function view($id)
    {
        $brand = Brandimage::find($id);
        $galleris = Brandgallery::where('brand_id', $brand->id)->get();
        return view("backend.pages.brandimg.view", compact("brand", "galleris"));
    }
}
