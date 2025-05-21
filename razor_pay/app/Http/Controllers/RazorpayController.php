<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;

class RazorpayController extends Controller
{
    public function payWithRazorpay()
    {
        return view('razorpayView');
    }

    public function payment(Request $request)
    {
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));

        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if ($payment->status == 'authorized') {
            // dd($payment); play with `$payment` variable
            $payment->capture(['amount' => $payment->amount]);
            return back()->with('success', 'Payment successful!');
        } else {
            return back()->with('error', 'Payment failed!');
        }
    }

    public function refundPayment($paymentId)
    {
        try {
            $api = new Api(config('razorpay.key'), config('razorpay.secret'));

            // Fetch payment to ensure it was successful or captured
            $payment = $api->payment->fetch($paymentId);

            if ($payment->status == 'captured') {
                // Initiate a full refund
                $refund = $api->payment->fetch($paymentId)->refund();

                return response()->json([
                    'message' => 'Refund initiated successfully.',
                    'refund_id' => $refund->id
                ]);
            } else {
                return response()->json([
                    'message' => 'Payment not eligible for refund. Status: ' . $payment->status
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
