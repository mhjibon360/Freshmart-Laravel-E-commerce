<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{

    /**
     * Show the checkout page.
     *
     * @return \Illuminate\View\View
     */
    public function checkout()
    {
        if (Cart::total() > 0) {
            $divisions = DB::table('divisions')->get();
            $districts = DB::table('districts')->get();
            $upazilas = DB::table('upazilas')->get();
            $unions = DB::table('unions')->get();
            return view('frontend.pages.checkout', compact(['divisions', 'districts', 'unions', 'upazilas']));
        } else {
            notyf()->error('Please shopping something');
            return redirect()->route('home.index');
        }
    }

    /**
     * Show the payment cashier.
     *
     * @return \Illuminate\View\View
     */
    public function paymentcashier(Request $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['upazila_id'] = $request->upazila_id;
        $data['union_id'] = $request->union_id;

        return view('frontend.pages.payment-cashier', compact('data'));
    }


    public function paymentstore(Request $request)
    {
        if (Session::has('coupon')) {
            $amount = Session::get('coupon')['total_amount'];
        } else {
            $amount = Cart::total();
        }

        if ($request->payment_method == 'stripe') {
            $data = [];
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            $data['post_code'] = $request->post_code;
            $data['notes'] = $request->notes;
            $data['division_id'] = $request->division_id;
            $data['district_id'] = $request->district_id;
            $data['upazila_id'] = $request->upazila_id;
            $data['union_id'] = $request->union_id;
            return view('frontend.pages.payment.stripe', compact(['data', 'amount']));
        } elseif ($request->payment_method == 'paypal') {
            return ('paypal');
        } elseif ($request->payment_method == 'mobile_banking') {
            $data = [];
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            $data['post_code'] = $request->post_code;
            $data['notes'] = $request->notes;
            $data['division_id'] = $request->division_id;
            $data['district_id'] = $request->district_id;
            $data['upazila_id'] = $request->upazila_id;
            $data['union_id'] = $request->union_id;
            return view('frontend.pages.payment.ssl-ecommerce', compact(['data', 'amount']));
        } else {
            // user_id	division_id	district_id	upazila_id	union_id	name	email	phone	address	post_code	notes	payment_type	payment_method	transaction_id	currency	amount	order_number	invoice_no	order_date	order_month	order_year	confirmed_date	processing_date	picked_date	shipped_date	delivered_date	cancel_date	return_date	return_reason	status	created_at	updated_at


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
                'payment_type' => 'Cash on Deiivery',
                'payment_method' => $request->payment_method,
                'currency' => '$',
                'amount' => round($amount),
                'order_number' => 'ORD' . now()->format('YmdHis') . rand(100, 999),
                'invoice_no' => 'FRMT' . mt_rand(10000000, 99999999),
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

            Cart::destroy();
            Session::forget('coupon');

            notyf()->success('Congratulation,order successfully');
            return redirect()->route('payment.success');
        }
    }


    /**
     * payment success
     */
    public function paymentsuccess()
    {
        return view('frontend.pages.paymnet-success');
    }



    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('frontend.pages.payment.stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request): RedirectResponse
    {
        if (Session::has('coupon')) {
            $amount = Session::get('coupon')['total_amount'];
        } else {
            $amount = Cart::total();
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Stripe Test Payment"
        ]);

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
            'payment_type' => 'Stripe Payment',
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

        Cart::destroy();
        Session::forget('coupon');

        notyf()->success('Congratulation,order successfully');
        return redirect()->route('payment.success');

        // return back()->with('success', 'Payment has been successful');
    }










    /**
     * get district by dependon division
     */
    public function getdistrict(Request $request)
    {
        $distircts = DB::table('districts')->where('division_id', $request->division_id)->get();
        return response()->json($distircts);
    }

    /**
     * get upazila by dependon district
     */
    public function getupazila(Request $request)
    {
        $upzilas = DB::table('upazilas')->where('district_id', $request->district_id)->get();
        return response()->json($upzilas);
    }

    /**
     * get district by dependon division
     */
    public function getunion(Request $request)
    {
        $unions = DB::table('unions')->where('upazilla_id', $request->upazila_id)->get();
        return response()->json($unions);
    }
}
