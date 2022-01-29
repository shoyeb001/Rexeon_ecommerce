@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="box box-widget widget-user" style="height: 300px !important">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black">
                    <h3 class="widget-user-username">Referer Name: {{ $refers[0]->user->name }} </h3>

                    <h6 class="widget-user-desc">Payment_method: {{ $refers[0]->payment_method }} </h6>

                    <h6 class="widget-user-desc">Paytm: {{ $refers[0]->paytm}} </h6>

                    <h6 class="widget-user-desc">Gpay: {{ $refers[0]->gpay }} </h6>

                    <h6 class="widget-user-desc">Account No: {{ $refers[0]->ac_no }} </h6>

                    <h6 class="widget-user-desc">IFSC Code: {{ $refers[0]->ifsc_code }} </h6>

                    <h6 class="widget-user-desc">Account Name: {{ $refers[0]->ac_name }} </h6>
                </div>
                
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

                            @foreach($referdetails as $item)
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
    </section>
    <!-- /.content -->
</div>

@endsection