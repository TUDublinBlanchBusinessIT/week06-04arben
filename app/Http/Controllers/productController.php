<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Illuminate\Support\Facades\Response;

class productController extends Controller
{
    public function displayGrid()
    {
        $products = Product::all();
        return view('products.displaygrid')
            ->with('products', $products);
    }

    public function additem($productid)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');

            if (isset($cart[$productid])) {
                $cart[$productid] = $cart[$productid] + 1;
            } else {
                $cart[$productid] = 1;
            }
        } else {
            $cart[$productid] = 1;
        }

        Session::put('cart', $cart);

        return Response::json([
            'success' => true,
            'total' => array_sum($cart)
        ], 200);
    }
}