<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalPaymentController extends Controller
{
    public function payment(Request $request)
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'Product 1',
                'price' => 9.99,
                'desc'  => 'Description for product 1',
                'qty' => 1
            ],
            [
                'name' => 'Product 2',
                'price' => 4.99,
                'desc'  => 'Description for product 2',
                'qty' => 2
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('paymentSuccess');
        $data['cancel_url'] = route('paymentCanceled');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;

        //give a discount of 10% of the order amount
        $data['shipping_discount'] = round((10 / 100) * $total, 2);

        $options = [
            'BRANDNAME' => 'Optic COder',
        ];

        $provider = new ExpressCheckout();

        $response = $provider->addOptions($options)->setExpressCheckout($data);

        return redirect($response['paypal_link']);
    }

    public function cancel(Request $request)
    {
        return view('paymentCanceled');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return view('paymentSuccess');
        }

        return view('paymentProblem');
    }
}
