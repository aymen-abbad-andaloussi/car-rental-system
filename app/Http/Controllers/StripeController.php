<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout(){
            // dd(Auth::user()->name);
            
            Stripe::setApiKey(config('stripe.sk'));
            
            $session = Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'mad',
                            'product_data' => [
                                "name" => "Reservation subscription",
                                "description" => "Hello Mr " . Auth::user()->name . " to rent this car please pay for that ! "
                            ],
                            'unit_amount'  => 50000,
                        ],
                        'quantity'   => 1,
                    ],

                ],
                'mode'        => 'payment', 
                'success_url' => route('home-cars'),
                'cancel_url'  => route('stripe.payement'),
            ]);
            
            flash()->success("Your Payement Successfully!");
            return redirect()->away($session->url);
    }
}
