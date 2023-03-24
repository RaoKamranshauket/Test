<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $req)
    {
        $pro_id = product::where('id', $req['pro_id'])->first();
        if (Auth::check()) {
            if ($pro_id) {
                $id = Auth::id();
                if (Cart::where('pro_id', $req['pro_id'])->where('user_id', $id)->exists()) {
                    return response()->json(['status' =>  $pro_id->name . "is already added"]);
                } else {
                    $cart = new Cart();
                    $cart->user_id = $id;
                    $cart->pro_id = $req['pro_id'];
                    $cart->pro_qty = $req['pro_qty'];
                    $cart->save();
                    return response()->json(['status' =>  $pro_id->name . "is added succesfuly"]);
                }
            } else
                return response()->json(['status' =>  "Please login First"]);
        }
    }
    public function viewProduct()
    {
        $carts=Cart::where('user_id',Auth::id())->get();

        return view('Frontend.Cart',compact('carts'));
    }


    public function removecart(Request $req)


    {

        $cart=Cart::where('pro_id',$req['cart_id'])->where('user_id',Auth::id())->first();

         if (Cart::where('pro_id',$req['cart_id'])->where('user_id',Auth::id())->exists()) {

            $cart->delete();
               return response()->json(['status' =>  "Product delete from the cart"]);
         }
         else
         {
            return response()->json(['status' =>  "Item not exist"]);
         }
    }


    public function updateProduct(Request $req)
    {
        $pro_id = product::where('id', $req['pro_id'])->first();
        if (Auth::check()) {

            if ($pro_id) {
                $id = Auth::id();

                if (Cart::where('pro_id', $req['pro_id'])->where('user_id', $id)->exists()) {

                    $cart = Cart::where('pro_id', $req['pro_id'])->where('user_id', $id)->first();
                    $cart->pro_qty = $req['pro_qty'];
                    $cart->update();
                    return response()->json(['status' =>  $pro_id->name . "is Updated succesfuly"]);

                }
            }
        }
            else
                return response()->json(['status' =>  "Please login First"]);
        }


}
