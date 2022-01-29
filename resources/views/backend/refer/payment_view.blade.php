@extends('admin.admin_master')
@section('admin')

@php
$date = date('d-m-y');
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
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            Recent All Refers

                        </h4>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>

                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">Referer Name</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Comission</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Total Refered</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Payment Details</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($refers as $item)
                                    <tr>
                                        <td class="pl-0 py-4">
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{$item->user->name}}
                                            </span>
                                        </td>

                                        <td>
                                        @php 
                                        $payments = App\Models\Referitem::where("refer_id",$item->id)->where("status","unpaid")->get();
                                        $comission = 0;
                                        $price = 0;                                        foreach ($payments as $payment) {
                                            $comission = $payment->comission + $comission;
                                            $price = $payment->sale_price + $price;
                                        }
                                        @endphp

                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{$comission}}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                INR {{ $price }}
                                            </span>

                                        </td>

                                        <td>

                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                <a href="{{route("refers.view.details",$item->user_id)}}" class="btn btn-primary">View Details</a>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16"><a href="{{route("refer.payment.complete",$item->id)}}" class="btn btn-success">Pay Completed</a></span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection