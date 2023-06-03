@extends('backend.includes.master')
@section('main-content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Show Product</li>
							</ol>
						</nav>
					</div>
					
				</div>
                <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Product Id</th>
										<th>Name</th>
										<th>Category id</th>
										<th>images</th>
										<th>Action</th>
									</tr>
								</thead>
                               @foreach ($brands as $brand)
                                   
                               
								<tbody>
									<tr>
										<td>{{ $brand->id }}</td>
										<td>{{ $brand->name }}</td>
										<td>{{ $brand->cat_id }}</td>
										<td>
										    <img height="75" weidth="100" src="{{ asset('backend/assets/images/brand/'.$brand->img) }}" alt="">
                                        </td> 

										<td>
											<a href="{{ route('viewgallery',$brand->id) }}" class="btn btn-success">view</a>
                                            <a href="{{ route('editproduct',$brand->id) }}" class="btn btn-info">edit</a>
                                            <a href="{{ route('deleteproduct',$brand->id) }}" class="btn btn-danger">delete</a>
                                        </td>
										
									</tr>
									
								</tbody>
                                @endforeach
								<tfoot>
									<tr>
									<th>Product Id</th>
										<th>Name</th>
										<th>Category id</th>
										<th>images</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
							
						</div>
					</div>
				</div>
				


@endsection