@extends('admin.admin_master')
@section('admin')

@php
	$date = Carbon\Carbon::now()->format('d F Y');
	$today = App\Models\Order::where('order_date',$date)->sum('amount');

	$month = date('F');
	$month = App\Models\Order::where('order_month',$month)->sum('amount');

    $year = date('Y');
	$year = App\Models\Order::where('order_year',$year)->sum('amount');

    $pending = App\Models\Order::where('status','pending')->get();

@endphp 
<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
		<div class="icon bg-primary-light rounded w-60 h-60">
			<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
			<h3 class="text-white mb-0 font-weight-500">INR {{ $today  }} <small class="text-success"><i class="fa fa-caret-up"></i> INR</small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-warning-light rounded w-60 h-60">
			<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale </p>
			<h3 class="text-white mb-0 font-weight-500">INR {{ $month }} <small class="text-success"><i class="fa fa-caret-up"></i> INR</small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-info-light rounded w-60 h-60">
			<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale </p>
			<h3 class="text-white mb-0 font-weight-500">INR {{ $year }} <small class="text-danger"><i class="fa fa-caret-down"></i> INR</small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-danger-light rounded w-60 h-60">
			<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Pending Orders </p>
			<h3 class="text-white mb-0 font-weight-500">{{ count($pending) }} <small class="text-danger"><i class="fa fa-caret-up"></i> Order </small></h3>
		</div>
	</div>
</div>
</div>
 
 
<div class="col-12">
<div class="box">
	<div class="box-header">
		<h4 class="box-title align-items-start flex-column">
		 Recent All Orders 
			 
		</h4>
	</div>

	@php
$orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();

	@endphp
	<!---this is test--->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Order List <span class="badge badge-pill badge-danger"> {{
					count($orders) }} </span></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Date</th>
							<th>Invoice</th>
							<th>Amount</th>
							<th>Payment</th>
							<th>Centers</th>
							<th>Status</th>

						</tr>
					</thead>
					<tbody>
					  @foreach ($orders as $item)
						  <tr>
							  <td> <span class="text-white font-weight-600 d-block font-size-16">{{ Carbon\Carbon::parse($item->order_date)->diffForHumans()  }} </span></td>
							  <td>	<span class="text-white font-weight-600 d-block font-size-16">
								{{ $item->invoice_no }}
							</span></td>
							  <td><span class="text-fade font-weight-600 d-block font-size-16">
								INR {{ $item->amount }}
							</span></td>
							  <td>					<span class="text-white font-weight-600 d-block font-size-16">
								{{ $item->payment_method }}
							</span></td>
							  <td><span class="text-white font-weight-600 d-block font-size-16">{{$item->pickupcenter->address}}</span></td>
							  <td>	<span class="badge badge-primary-light badge-lg">{{ $item->status }}</span></td>
						  </tr>
					  @endforeach
					</tbody>

				</table>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
	<!---test ends--->

	
					</div>  
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>

@endsection