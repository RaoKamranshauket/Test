@extends('Frontend.Frontend')
@section('title')
 View Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="card">
    <div class="card-header bg-primary text-white">
        Order View
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
              <div class="card">
            <div class="card-header">
            <h4>Client Details</h4>
            </div>
            <hr>
                <div class="card-body order-details">
                <label for="">First Name</label>
                <div class="border">{{$order->fname}}</div>
                <label for="">Last Name</label>
                <div class="border">{{$order->lname}}</div>
                <label for="">Contact Number</label>
                <div class="border">{{$order->phone}}</div>
                <label for="">Address</label>
                <div class="border">{{$order->address1}}</div><br>
                <div class="border">{{$order->address2}}</div><br>
                <div class="border">{{$order->country}}</div><br>
                <div class="border">{{$order->state}}</div><br>
                <div class="border">{{$order->city}}</div><br>
                <label for="">Zip Code</label>
                <div class="border">{{$order->pincode}}</div>
            </div>

            </div>
        </div>
        <div class="col md-6">
        <div class="card">

            <div class="card-header">
            <h5>  My  Order </h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                    </thead>
                    @foreach ($order->OrderItems as $item)
                        <tr>
                            <td>{{$item->products->name}}</td>

                            <td>{{$item->qty}}</td>
                            <td>{{$item->price}}</td>
                            <td><img src="{{asset('/assests/upload/product/'.$item->products->image)}}" width="50px" /></td>
                        </tr>
                    @endforeach
                </table>
                <h4>Grand total: {{$order->total_price}}</h4>
            </div>
        </div></div>
    </div>
</div>
@endsection
