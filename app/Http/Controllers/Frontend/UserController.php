<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders=Order::where('user_id',Auth::id())->get();
           return view('Frontend.orders.view',compact('orders'));
    }
    public function Order_details($id)
    {
        $order=Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('Frontend.orders.orderdetail',compact('order'));
    }
}
