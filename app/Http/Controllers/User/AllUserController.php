<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
use App\Models\OrderItem;
use Carbon\Carbon;


class AllUserController extends Controller
{
    public function MyOrder()
    {
        $orders = Order::where('user_id', session("USER_ID"))->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order_view', compact('orders'));
    }

    public function OrderDetails($order_id)
    {
        $order = Order::where('id', $order_id)->where('user_id', session("USER_ID"))->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order_details', compact('order', 'orderItem'));
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('user')->where('id', $order_id)->where('user_id', session("USER_ID"))->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function ReturnOrder(Request $request, $order_id)
    {
        Order::where("id",$order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);


        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.myorder')->with($notification);
    }

    public function ReturnOrderList()
    {
        $orders = Order::where('user_id', session("USER_ID"))->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.return_order_view', compact('orders'));
    }

    public function OrderTracking(Request $request)
    {
        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {

            // echo "<pre>";
            // print_r($track);

            return view('frontend.tracking.track_order', compact('track'));
        } else {

            $notification = array(
                'message' => 'Invoice Code Is Invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function CancelOrders(){
        $orders = Order::where('user_id',session("USER_ID"))->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order_view',compact('orders'));
    }
}
