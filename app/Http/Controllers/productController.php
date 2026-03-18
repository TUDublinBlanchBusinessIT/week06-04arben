<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Illuminate\Support\Facades\Response;

class productController extends Controller
{
    public function displayGrid(Request $request)
    {
        $products=\App\Models\Product::all();
        
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            
            $totalQty=0;
            foreach ($cart as $product => $qty) {
                $totalQty = $totalQty + $qty;
            }
            $totalItems=$totalQty;
        }
        else {
            $totalItems=0;
            
        }
        return view('products.displaygrid')
        ->with('products',$products)->with('totalItems',$totalItems);
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
    public function emptycart()
    {
        if (Session::has('cart')) {
            Session::forget('cart');
        }
        return Response::json(['success'=>true],200);
    }


}