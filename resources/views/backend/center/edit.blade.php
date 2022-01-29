@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

		 

<!--   ------------ Add Category Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Update Pickup Center </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{route("pickupcenter.update")}}" enctype="multipart/form-data">
	 	@csrf
 <input type="hidden" name="id" value="{{ $centers[0]->id }}">						    
	 	 

	 <div class="form-group">
		<h5>Center Address <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="address" class="form-control" value="{{$centers[0]->address}}" > 
	 @error('address') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	


	<div class="form-group">
		<h5>Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control"  value="{{$centers[0]->name}}" >
     @error('name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 

	<div class="form-group">
		<h5>Phone  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="number" name="phone" class="form-control"  value="{{$centers[0]->name}}" >
     @error('phone') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection