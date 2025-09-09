<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Raziul\Sslcommerz\Facades\Sslcommerz;

class SslcommerzController extends Controller
{
    // Checkout থেকে Payment শুরু
    public function pay(Request $request)
    {

        $invoiceId = uniqid();
        $productName = $request->name;
        $email = $request->email;
        $mobile = $request->phone;
        if (Session::has('coupon')) {
            $amount = Session::get('coupon')['total_amount'];
        } else {
            $amount = Cart::total();
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'union_id' => $request->union_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_type' => 'Ssl Commerce',
            'payment_method' => $request->payment_method,
            'currency' => '$',
            'amount' => round($amount),
            'order_number' => 'ORD' . now()->format('YmdHis') . rand(100, 999),
            'invoice_no' => 'FRMT' . mt_rand(10000000, 99999999),
            'transaction_id' => 'TRX' . mt_rand(10000000, 99999999),
            'order_date' => now(),
            'order_month' => date('m'),
            'order_year' => date('Y'),
            'status' => 'pending',
        ]);

        // ORDER DETAILS
        foreach (Cart::content() as $item) {
            Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'color' => $item->options->color,
                'size' => $item->options->size,
                'qty' => $item->qty,
                'price' => $item->price,
            ]);
        }

        $response = Sslcommerz::setOrder($amount, $invoiceId, $productName)
            ->setCustomer($productName, $email, $mobile)
            ->setShippingInfo(1, $request->address)
            ->makePayment();

        if ($response->success()) {
            return redirect($response->gatewayPageURL());
        }

        Cart::destroy();
        Session::forget('coupon');

        notyf()->success('Congratulation,order successfully');
        return redirect()->route('payment.success');
    }

    // Payment Success
    public function success(Request $request)
    {
        return "Payment Successful ✅";
    }

    // Payment Failure
    public function failure(Request $request)
    {
        // return "Payment Failed ❌";
        notyf()->error('Payment Failed');
    }

    // Payment Cancel
    public function cancel(Request $request)
    {
        return "Payment Cancelled ⚠️";
    }

    // Instant Payment Notification (IPN)
    public function ipn(Request $request)
    {
        return "IPN received";
    }
}
