<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Str;

class RazorpayController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }
    public function createOrder(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $amount = $request->amount * 100; // convert to paise
        $receipt = 'rcpt_' . Str::random(10);

        $order = $api->order->create([
            'receipt' => 'order_rcptid_11',
            'amount' => $amount, // amount in paise
            'currency' => 'INR'
        ]);

        $order = Order::create([
            'razorpay_order_id' => $order['id'],
            'user_id' => "11",
            'amount' => $amount,
            'receipt' => $receipt,
            'status' => 'created'
        ]);

        return response()->json([
            'order_id' => $order->razorpay_order_id,
            'amount' => $order->amount,
            'key' => env('RAZORPAY_KEY')
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->firstOrFail();

            // Prevent duplicate payment entry
            if ($order->payment) {
                return response()->json(['message' => 'Already paid'], 200);
            }

            Payment::create([
                'order_id' => $order->id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
                'amount' => $order->amount,
                'status' => 'success'
            ]);

            $order->update(['status' => 'paid']);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'failed']);
        }
    }
}