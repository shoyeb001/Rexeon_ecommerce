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
                                        <th style="min-width: 250px"><span class="text-white">Referer</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Comision</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Date</span></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($refers as $item)
                                    <tr>
                                        <td class="pl-0 py-4">
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                <?php
                                                 $referer = App\Models\Referer::where("id",$item->refer_id)->get();
                                                 ?>

                                                 {{$referer[0]->user->name}}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                INR {{ $item->comission }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{ $item->created_at }}
                                            </span>
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