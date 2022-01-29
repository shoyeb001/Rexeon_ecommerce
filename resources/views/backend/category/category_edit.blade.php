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
				  <h3 class="box-title">Update Category </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{route("update.category",$result[0]->category_slug)}}" enctype="multipart/form-data">
	 	@csrf
 <input type="hidden" name="old_image" value="{{ $result[0]->category_image }}">						    
	 	 

	 <div class="form-group">
		<h5>Category English  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="category_name" class="form-control" value="{{ $result[0]->category_name }}" > 
	 @error('category_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	


	<div class="form-group">
		<h5>Category Icon  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="category_icon" class="form-control"  value="{{ $result[0]->category_icon }}" >
     @error('category_icon') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 

	<div class="form-group">
		<h5>Category Icon Image <span class="text-danger">*</span></h5>
		<div class="controls">
 <input type="file" name="cat_img" class="form-control" onChange="mainThamUrl(this)" >
 @error('cat_img') 
 <span class="text-danger">{{ $message }}</span>
 @enderror
 <img src="" id="mainThmb">
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