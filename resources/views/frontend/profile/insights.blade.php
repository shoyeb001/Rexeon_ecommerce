@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

       <div class="col-md-2">
       </div>

       <div class="col-md-8">
        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-4">
                  <label for="">Earning Date</label>
                </td>

                <td class="col-md-1">
                  <label for="">Earning</label>
                </td>
                
              </tr>
              @php
                  $total_earning = 0;
              @endphp


              @foreach($refers as $refer)
       <tr>
        <td class="col-md-2">
          <label for=""> {{ $refer->created_at }}</label>
        </td>

                <td class="col-md-3">
                  <label for=""> INR {{ $refer->comission }}</label>
                </td>

              </tr>

              @php
                  $total_earning = $refer->comission+$total_earning
              @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td>  <h5>Total Earning: INR {{$total_earning}}</h5></td>
                <td><h5>INR {{$total_earning}}</h5></td>
              </tr>
              <tr>
                <td><h5> Due: INR {{$due_payment}}</h5></td>
                <td><h5> Paid: INR {{$paid_payment}}</h5></td>
              </tr>
            </tfoot>
          </table>
          <h4>Total Earning: INR {{$total_earning}}</h4>

          @php
              $payment = App\Models\Referer::where("id",session("REFER_ID"))->get();
            @endphp
              @if ($payment[0]->payment_method == "bank_transfer")
                @if ($payment[0]->ac_no == NULL) 
                  <p class="text-center">Please Add Your Payment Details</p>
                @endif
              @elseif ($payment[0]->payment_method=="paytm")
                  @if ($payment[0]->paytm == NULL)
                  <p>Please Add Your Payment Details</p>
                  @endif
               @elseif ($payment[0]->payment_method=="gpay")
                   @if($payment[0]->gpay==NULL)
                   <p>Please Add Your Payment Details</p>
               @endif   
              @endif
              

        </div>




         
       </div> <!-- / end col md 8 -->

		 

		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection