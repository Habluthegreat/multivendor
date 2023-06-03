@extends('backend.includes.master')
@section('main-content')
<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Brand</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Brand</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
                <!--end row-->
				

               
                <div class="card">
					<div class="card-body">
							<!-- add brand buttom -->
							<div class="font-20 text-primary">
								<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fadeIn animated bx bx-plus-circle"></i></button>
							</div>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="inline-size:100%">
									<thead>
										<tr>
											<th>Brand Name</th>
											<th>Description</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="all">
										
										
									</tbody>
								
									<tfoot>
										<tr>
											<th>Brand Name</th>
											<th>Description</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</tfoot>
								</table>
								
							</div>
					</div>
				</div>


<!-- Add Modal -->
<div class="modal" id="addmodal">
  	<div class="modal-dialog">
    	<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
	  
				<!-- Modal body -->
				<div class="row">
			  		<div class="col-xl-9 mx-auto">
						<hr/>
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-danger"></i>
										</div>
										<h5 class="mb-0 text-info">Add Brand</h5>
									</div>
						            <hr/>
                                    
                                        
									<div class="row mb-3">
										<div class="col-sm-12">
											<input type="text" name="name" class="form-control text-center brand-name" id="brand-name" placeholder="Enter Product Name">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-12">
											<input type="text" name="des" class="form-control text-center brand-des" id="brand-des" placeholder="Product Description">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-12">
											<input type="text" name="price" class="form-control  text-center brand-price" id="brand-price" placeholder="Price">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-12">
											<input type="text" name="quantity" class="form-control text-center brand-quantity" id="brand-quantity" placeholder="Quantity">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-12">
											<select name="status" class="form-control text-center brand-status" id="brand-status">
                                                <option value="">-----Select Status-----</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-9">
											<button type="submit" data-bs-dismiss="modal" class="btn btn-info px-5 add-brand" id="add-brand">Add</button>
											<button type="submit" data-bs-dismiss="modal" class="btn btn-info px-5 update-btn" style="display:none" id="update-btn">Update</button>
										</div>
									</div>
                                  
								</div>
							</div>
						</div>
					</div>
				</div>

    	</div>
  	</div>
</div>
				
@endsection	

