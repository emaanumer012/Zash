<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;


class AdminOrderController extends Controller
{   

    /**
     * Retrieve all checkouts and render the OrdersTable view.
     *
     * @return \Illuminate\View\View
     */
    public function orderTable()
    {
        $checkouts = Checkout::all();
        $checkouts=$checkouts->toArray();
        $data = compact('checkouts');
        return view("OrdersTable")->with($data);
    }

}
