<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['success' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData(Request()->get('paymentData'));

        //save payment details to database
        Payments::create([
            'user_id' => Auth::user()->id,
            'course_id' => $paymentDetails['data']['metadata']['course_id'],
            'instructor'=> $paymentDetails['data']['metadata']['instructor'],
            'amount' => $paymentDetails['data']['metadata']['amount'],
           'status' => $paymentDetails['data']['status'],
            
                ]);
// dd($paymentDetails);
        //redirect to payment page
        return redirect()->route('dashboard')->withMessage(['success' => 'Payment Successful', 'type' => 'success']);
      dd($paymentDetails);


        return redirect('/dashboard')->with('success', 'Payment Successful');

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
