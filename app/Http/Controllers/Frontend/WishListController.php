<?php

namespace App\Http\Controllers\Frontend;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $wishList=WishList::where('user_id',Auth::id())->get();

        return view('Frontend.wishlist.index',compact('wishList'));
    }
    public function addWishList(Request $req)
    {

        $pro_id = product::where('id', $req['pro_id'])->first();
        if (Auth::check()) {
            if ($pro_id) {
                $id = Auth::id();
                if (WishList::where('pro_id', $req['pro_id'])->where('user_id', $id)->exists()) {
                    return response()->json(['status' =>  $pro_id->name . "is already added"]);
                } else {
                    $wish = new WishList();
                    $wish->user_id = $id;
                    $wish->pro_id = $req['pro_id'];
                    $wish->save();
                    return response()->json(['status' =>  $pro_id->name . "is added succesfuly"]);
                }
            }
        }
        else
           {return response()->json(['status' =>  "Please login First"]);
   }
    }
    public function removewishList(Request $req)
    {

        $cart=WishList::where('pro_id',$req['pro_id'])->where('user_id',Auth::id())->first();

         if (WishList::where('pro_id',$req['pro_id'])->where('user_id',Auth::id())->exists()) {

            $cart->delete();
               return response()->json(['status' =>  "Product delete from the cart"]);
         }
         else
         {
            return response()->json(['status' =>  "Item not exist"]);
         }
    }

    }
