<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Store checkout data in the database and render the confirmation view.
     *
     * @param \Illuminate\Http\Request $req
     * @return \Illuminate\View\View
     */
    public function getData(Request $req): View
    {
        // Create a ne checkout instance
        $checkout = new Checkout;

        // Set properties of the checkout instance from the request data
        $checkout->firstname = $req->fname;
        $checkout->lastname = $req->lname;
        $checkout->email = $req->email;
        $checkout->address = $req->address;
        $checkout->city = $req->city;

        // Save checkout instance to the database
        $checkout->save();

        // Render the confirmation view
        return view("confirmation");
    }
}
