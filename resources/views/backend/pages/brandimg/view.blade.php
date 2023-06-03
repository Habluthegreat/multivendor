@extends('backend.includes.master')
@section('main-content')
<div class="row">
    <div class="col-md-6">
        <h3>Brand info</h3>
        <p>{{$brand->name}}</p>
        <p>Categoty Id : {{$brand->cat_id}}</p>
        <p><img src="{{asset('backend/assets/images/brand/'.$brand->img)}}" alt=""></p>
    </div>
    <div class="col-md-6">
        <h3>Gallery</h3>
        @foreach ($galleris as $gallery )
        <img src="{{asset('backend/assets/images/brand/gallery/'.$gallery->images)}}" alt="">
        @endforeach
        
    </div>
</div>

@endsection