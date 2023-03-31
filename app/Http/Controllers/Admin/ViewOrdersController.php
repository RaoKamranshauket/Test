<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewOrdersController extends Controller
{
    public function index()
    {
        $orders=Order::where('status','0')->get();
        return view('admin.orders.pendingorders',compact('orders'));
    }
    public function CompletedOrders()
    {
        $orders=Order::where('status','1')->get();
        return view('admin.orders.CompletedOrders',compact('orders'));
    }
    public function PendingOrder_details($id)
    {
        $order=Order::where('id',$id)->first();

        return view('admin.orders.pendingOrderDetail',compact('order'));
    }
    public function UpdateStatus(Request $req)
    {
        $order=Order::where('id',$req['id'])->first();
        $order->status=$req['status']=='Completed' ? '1':'0';
        $order->update();
        return redirect('View-PendingOrders')->with('status','Status updated successfuly');
    }
}
