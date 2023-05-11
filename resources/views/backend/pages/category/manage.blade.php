@extends('backend.includes.master')
@section('main-content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Category</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Show Category</li>
							</ol>
						</nav>
					</div>
					
				</div>
                <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="inline-size:100%">
								<thead>
									<tr>
										<th>Category Name</th>
										<th>Description</th>
										<th>Details</th>
										<th>Quantity</th>
										<th>Status</th>
                                        <th>Action</th>
									</tr>
								</thead>
                                @foreach ($categories as $category)
                                <tbody>
									<tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->des }}</td>
                                        <td>{{ $category->details }}</td>
                                        <td>{{ $category->quantity }}</td>
                                        <td>
											@if($category->status==1)
											<a href="{{ route('activecategory',$category->id) }}"class="btn btn-info btn-sm">Active</a>
											@else
											<a href="{{ route('inactivecategory',$category->id) }}" class="btn btn-success btn-sm">Inactive</a>
											@endif
										</td>
                                        <td>
                                            <a href="{{ route('editcategory', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('destrycategory', $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                        
                                        
                                    </tr>
									
                                </tbody>
                                @endforeach
								
                               
								<tfoot>
									<tr>
                                        <th>Category Name</th>
										<th>Description</th>
										<th>Details</th>
										<th>Quantity</th>
										<th>Status</th>
                                        <th>Action</th>
									</tr>
								</tfoot>
							</table>
							
						</div>
					</div>
				</div>
				

@endsection