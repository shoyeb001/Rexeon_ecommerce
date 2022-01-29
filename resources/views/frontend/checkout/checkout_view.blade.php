@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
My Checkout
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->

                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                                            <form class="register-form" action="{{route("checkout.store")}}" method="POST">
                                                @csrf

                                                @php
                                                $user = App\Models\User::where("id",session("USER_ID"))->get();
                                                @endphp

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Shipping
                                                            Name</b> <span>*</span></label>
                                                    <input type="text" name="shipping_name"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Full Name"
                                                        value="{{ $user[0]->name }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Email </b>
                                                        <span>*</span></label>
                                                    <input type="email" name="shipping_email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Email"
                                                        value="{{ $user[0]->email }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Phone</b>
                                                        <span>*</span></label>
                                                    <input type="number" name="shipping_phone"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Phone"
                                                        value="{{ $user[0]->phone }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Post Code </b>
                                                        <span>*</span></label>
                                                    <input type="text" name="post_code"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Post Code" required="">
                                                </div> <!-- // end form group  -->
                                                
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Pickup Center </b>
                                                        <span>*</span></label>
                                                    <select name="pickup_center"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1"required="">
                                                        <option default>Pickup Center</option>
                                                        <?php
                                                         $pickup_centers = App\Models\Pickupcenter::get();
                                                        ?>
                                                        @foreach ($pickup_centers as $item)
                                                           <option value="{{$item->id}}">{{$item->address}}</option> 
                                                        @endforeach
                                                    </select>
                                                </div> <!-- // end form group  -->



                                        </div>
                                        <!-- guest-login -->





                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>Division </b>
                                                    <span>*</span></label>
                                                <input type="text" name="division"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputEmail1" placeholder="Divition" required="">
                                            </div> <!-- // end form group  -->
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>District </b> <span>*</span></label>
                                                <input type="text" name="district" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="district" required="">
                                              </div>  <!-- // end form group  -->
                                              <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>State</b> <span>*</span></label>
                                                <input type="text" name="state" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="State" required="">
                                              </div>  <!-- // end form group  -->
                                        




                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Notes
                                                    <span>*</span></label>
                                                <textarea class="form-control" cols="30" rows="5" placeholder="Notes"
                                                    name="notes"></textarea>
                                            </div> <!-- // end form group  -->








                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->




                    </div><!-- /.checkout-steps -->
                </div>




                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                        @foreach($carts as $item)
                                        <li>
                                            <strong>Image: </strong>
                                            <img src="{{ asset($item->options->image) }}"
                                                style="height: 50px; width: 50px;">
                                        </li>

                                        <li>
                                            <strong>Qty: </strong>
                                            ( {{ $item->qty }} )

                                            <strong>Color: </strong>
                                            {{ $item->options->color }}

                                            <strong>Size: </strong>
                                            {{ $item->options->size }}
                                        </li>
                                        @endforeach
                                        <hr>
                                      {{--  <li>
                                            @if(Session::has('coupon'))

                                            <strong>SubTotal: </strong> ${{ $cartTotal }}
                                            <hr>

                                            <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name']
                                            }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                            <hr>

                                            <strong>Coupon Discount : </strong> ${{
                                            session()->get('coupon')['discount_amount'] }}
                                            <hr>

                                            <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount']
                                            }}
                                            <hr>


                                            @else

                                            <strong>SubTotal: </strong> ${{ $cartTotal }}
                                            <hr>

                                            <strong>Grand Total : </strong> ${{ $cartTotal }}
                                            <hr>


                                            @endif

                                        </li>--}}



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>







                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">Card</label>
                                        <input type="radio" name="payment_method" value="card">
                                        <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">Cash</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('frontend/assets/images/payments/6.png') }}">
                                    </div> <!-- end col md 4 -->


                                </div> <!-- // end row  -->
                                <hr>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment
                                    Step</button>


                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>







                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->








        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->




@endsection