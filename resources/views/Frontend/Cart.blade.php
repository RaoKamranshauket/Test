@extends('Frontend.Frontend')
@section('title')
 Cart
@endsection


@section('content')
<div class="py-3 mb-5 shadow-sm bg-warning  border-top">
    <div class="container">
        <h6 class="mb-0" >
           <a   href="{{url('/')}}">Home</a>
            /Cart</h6>
    </div>
</div>
@php
$total=0;
@endphp
<div class="container my-5">
    <div class="card shadow product">
        <div class="card-body ">
            @foreach ($carts as $item)
            <div class="row product">
                <div class="col-md-2">
                <img src="{{asset('assests/upload/product/'.$item->products->image)}}" style="height: 70px;width:70px" alt="all ok">
            </div>
     <div class="col-md-5">
        <h3>{{$item->products->name}}</h3>
        </div>
        <div class="col md-2">
            <input type="hidden" value="{{$item->products->id}}" class="cart_id">
            @if ($item->products->qty >= $item->pro_qty)
             <label for="Quantity">Quantity</label>
             <div class="input-group text-center mb-3" style="width:130px" >
                 <span class="input-group-text qtychange decrement-btn">-</span>
                 <input type="text" name="quantity" value="{{$item->pro_qty}}" class="form-control qty text-center" />
                 <span class="input-group-text qtychange increment-btn">+</span>
                 @php
$total+=$item->products->selling_price*$item->pro_qty;
@endphp
             </div>
             @else
<h5>Out of Stock</h5>
@endif
         </div>
         <div class="col-md-2">
            <button type="button" class="btn btn-danger rm-btn" >Remove<i class="fa fa-trash"></i></button>
            </div>
        </div>

        @endforeach
        </div>

<div class="card-footer">

<h6 >Total Price: <b> {{$total}} </b>
   <a href="{{url('checkout-cart')}}" class=" btn btn-outline-success float-end chk-btn" >Proced to Checkout</a>
</h6>
</div>
        </div>
        </div>
        @endsection
