@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
      
		 @include('frontend.common.user_sidebar')
 
			<div class="col-md-2">
				
			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
  <div class="card">
  	<h3 class="text-center"><span class="text-danger">Share Refer Link</span><strong> </strong>   </h3>
    <p class="text-center">Share the refer link and earn when someone will shop from your link</p>
  	<div class="card-body">
  		
         <div class="form-group">
            <form role="form" class="form-inline form-cnt">
                <div class="form-container">
                    <div class="form-group">
                        <label for="exampleInputTag">Share Refer Link: </label>
                        <?php
                            $link = url("login/refer/$refer_id");
                        
                        ?>
                        <input type="url" id="exampleInputTag" class="form-control txt" value="{{$link}}">

                    </div>

                    <button class="btn btn-upper btn-primary" type="button" onclick="CopyFunction()">COPY LINK
                    </button>
                </div><!-- /.form-container -->
            </form><!-- /.form-cnt -->

        </div>

  	</div>

 
  	
  </div>
				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

<script>
	function CopyFunction(){
  var copyText = document.getElementById("exampleInputTag");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  alert("Copied the link: " + copyText.value);
}

</script>
@endsection

