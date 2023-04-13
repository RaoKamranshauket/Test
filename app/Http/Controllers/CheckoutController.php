<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $req)
    {
        $old_cart=Cart::where('user_id',Auth::id())->get();

foreach($old_cart as $it)
{if(!product::where('id',$it->products->id)->where('qty','>=',$it->pro_qty)->exists())
{

     $pro=Cart::where('pro_id',$it->pro_id)->first();
     $pro->delete();

}
}
$cart=Cart::where('user_id',Auth::id())->get();
return view('Frontend.CartCheckout',compact('cart'));
    }

public function placeorder(Request $req)
{
    $cart_items=Cart::where('user_id',Auth::id())->get();
      $total_price=0;
    foreach ($cart_items as $item) {
          $total_price+=$item->pro_qty*$item->products->selling_price;
    }
$order=new Order();
$order->user_id=Auth::user()->id;
$order->fname=$req['fname'];
$order->lname=$req['lname'];
$order->email=$req['email'];
$order->phone=$req['phone'];
$order->address1=$req['address1'];
$order->address2=$req['address2'];
$order->city=$req['city'];
$order->state=$req['state'];
$order->country=$req['country'];
$order->pincode=$req['pincode'];
$order->total_price=$total_price;

$order->tracking_no=$req['fname'].rand(1,10000);
$order->save();


$cart=Cart::where('user_id',Auth::id())->get();
foreach ($cart as $item) {
OrderItem::create([
  'order_id'=> $order->id,
  'pro_id'=> $item->pro_id,
  'qty'=> $item->pro_qty,
  'price'=> $item->products->selling_price,

]);

if(product::where('id',$item->products->id)->exists())
{
    $pro=product::where('id',$item->products->id)->first();
$pro->qty=$pro->qty-$item->pro_qty;
$pro->update();$item->delete();

}
}

return redirect('/')->with('status','Order Place Successfuly');
}


    public function razorpay(Request $request)
    {
    $cart=Cart::where('user_id',Auth::id())->get();
$total_amount=0;
    foreach ($cart as $item) {
        $total_amount+=$item->products->selling_price*$item->pro_qty;
    }
    $fname   = $request->input('fname');
    $email   = $request->input('email');
    $phone   = $request->input('phone');
    $lname    = $request->input('lname');
    $address2  = $request->input('address2');
    $city     =  $request->input('city ');
    $state    = $request->input('state');
    $county   = $request->input('count');
    $pincode   =$request->input('pincode');
    $address1   = $request->input('address1');

        //     'fname' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //    'lname' => 'required',
        //  'address2' => 'required',
        //     'city' => 'required',
        //     'state' =>  'required',
        //  'country' =>  'required',
        //   'pincode' =>  'required',
        //   'address1' => 'required',
        // ]);



        return response()->json([
        'fname' =>$fname,
        'email' =>$email,
        'phone' =>$phone,
       'lname'  =>$lname,
      'address2'=>$address2,
        'city' =>$city,
        'state' =>$state,
      'country' =>$county,
      'pincode' =>$pincode,
      'address1'=>$address1,
      'total_amount' => $total_amount,
      ]);
    }


}
