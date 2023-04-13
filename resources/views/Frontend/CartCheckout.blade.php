        @extends('Frontend.Frontend')
@section('title')
 Cart
@endsection


@section('content')
<div class="py-3 mb-5 shadow-sm bg-warning  border-top">
    <div class="container">
        <h6 class="mb-0" >
           <a   href="{{url('/')}}">Home</a>
           <a   href="{{url('view-cart')}}"> /Cart</a>
            /Check Out</h6>
    </div>
</div>
<div class="container my-5">
<form action="{{url('place-order')}}" method="POST">
<div class="row">
@csrf
<div class="col-md-7">
    <div class="card">
        <div class="card-body ">
<h5>Basic Details</h5>
<hr>
<div class="row checkout-form">
<div class="col-md-6">
<label for="">First Name</label>
<input type="text" name="fname" class="form-control fname"  placeholder="Enter First Name">
    <span class="text-danger" id="fname-error"></span>
</div>
<div class="col-md-6">
<label for="">Last Name</label>
<input type="text" name="lname" class="form-control lname" placeholder="Enter Last Name" >

    <span class="text-danger" id="lname-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">Email</label>
<input type="text" name="email" class="form-control email " placeholder="Enter Email Address" >

    <span class="text-danger" id="email-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">Phone Number</label>
<input type="text" name="phone" class="form-control phone " placeholder="Enter  Phone Number " >

    <span class="text-danger" id="phone-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">Address 1</label>
<input type="text" name="address1" class="form-control address1 " placeholder="Enter Address 1 " >
    <span class="text-danger" id="address1-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">Address 2</label>
<input type="text" name="address2" class="form-control address2 " placeholder="Enter Address  2 " >

    <span class="text-danger" id="address2-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">City</label>
<input type="text" name="city" class="form-control city " placeholder="Enter CIty Name" >
    <span class="text-danger" id="city-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">State</label>
<input type="text" name="state" class="form-control state   " placeholder="Enter State Name" >

    <span class="text-danger" id="state-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">Country</label>
<input type="text" name="country" class="form-control country" placeholder="Enter Country Name" >
    <span class="text-danger" id="country-error"></span>

</div>
<div class="col-md-6 mt-3">
<label for="">PinCode</label>
<input type="text" name="pincode" class="form-control pincode" placeholder="Enter Pincode " >
    <span class="text-danger" id="pincode-error"></span>
</div>
</div>
             </div>
             </div>
    </div>
    <div class="col-md-5">
    <div class="card">
        <div class="card-body ">
<h5>Other Details</h5>
<hr>
@if($cart->count() > 0)
<table class="table table-striped">
<tbody>
<tr>
<th>Name</th>
<th>Price</th>
<th>QTy</th>
</tr>
@foreach($cart as $item)
<tr>
<td>{{$item->products->name}}</td>
<td>{{$item->products->selling_price}}</td>
<td>{{$item->pro_qty}}</td>
</tr>
@endforeach
</tbody>
</table>
<hr>

<button type="submit" class="btn btn-success w-100 " >Place Order| COD</button>
<button type="button" class="btn btn-primary w-100 razorBtn mt-3" >Pay With Razorpay</button>
@else
    <h4 class="text-center">You have no item in the cart.</h4>
@endif
</div>
             </div>
    </div>
    </div>
    </form>
 </div>

            @endsection
