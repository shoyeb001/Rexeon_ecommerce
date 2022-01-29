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
  	<h3 class="text-center"><span class="text-danger">Payment Details</span><strong> </strong>   </h3>

  	<div class="card-body">
  		


  		<form method="post" action="{{route("refer.payment.update")}}">
  			@csrf


         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Payment Method <span> </span></label>
            <select name="payment_method" class="form-control" required="" >
                <option value="paytm" {{ $payment[0]->payment_method == "paytm" ? 'selected': '' }} >Paytm</option>	
                <option value="gpay" {{ $payment[0]->payment_method == "gpay" ? 'selected': '' }} >Gpay</option>	
                <option value="bank_transfer" {{ $payment[0]->payment_method == "bank_transfer" ? 'selected': '' }} >Bank Transter</option>	  
            </select>
        </div>

        @if ($payment[0]->payment_method == "paytm")
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Paytm Number<span> </span></label>
            <input type="text" id="password" name="paytm" class="form-control" value="{{$payment[0]->paytm}}" required>
        </div>
        @elseif($payment[0]->payment_method == "bank_transfer")
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Bank Ac NO <span> </span></label>
            <input type="number" id="confirm password" name="ac_no" value="{{$payment[0]->ac_no}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">IFSC Code <span> </span></label>
            <input type="text" id="confirm password" name="ifsc_code" value="{{$payment[0]->ifsc_code}}" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Ac Holder Name <span> </span></label>
            <input type="text" id="confirm password"  value="{{$payment[0]->ac_name}}" name="ac_name" class="form-control" required>
        </div>
        @elseif($payment[0]->payment_method == "gpay")
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Google Pay ID <span> </span></label>
            <input type="text" id="confirm password" value="{{$payment[0]->gpay}}" name="google_pay" class="form-control" required>
        </div>
        @endif

         <div class="form-group">            
           <button type="submit" class="btn btn-danger">Update</button>
        </div>         
 

  			
  		</form>  		
  	</div>

 
  	
  </div>
				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection

