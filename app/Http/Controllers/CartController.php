<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    function show()
    {
        $items= DB :: table('carts') -> select("carts.Quantity", "product.price", "product.Title", "product.picPath","product.productID")->join('product','product.productID','=','carts.productID')->get();

        return view("cart",["items"=>$items]);
    }