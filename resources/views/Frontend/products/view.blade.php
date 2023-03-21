@extends('Frontend.Frontend')
@section('title')
{{$category->name}}
@endsection


@section('content')
<div class="py-3 mb-5 shadow-sm bg-warning  border-top">
    <div class="container">
        <h6 class="mb-0" >Collections/Category Name/Product Name</h6>
    </div>
</div>
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                <img src="{{asset('assests/upload/product/'.$product->image)}}" class="w-100" alt="all ok">
            </div>
     <div class="col-md-8">
        <h2 class="mb-0">
            {{$product->name}}
            <label style="font-size:16px;" class="float-end badge bg-danger tranding_tag">Trending</label>
        </h2>

        <hr>
        <label class="me-3">Orignal Price : <s>Rs {{$product->orignal_price}}</s></label>
        <label class="fw-bold">Selling Price : Rs {{$product->selling_price}}</label>
    <p class="mt-3">
    {!! $product->small_description!!}
    </p>
    <hr>
    @if($product->qty > 0)
     <label  class="badge bg-success">In Stock</label>
       @else
     <label  class="badge bg-danger">Out of Stock</label>
    @endif
    <div class="row mt-2">
        <div class="col md 2">
            <label for="Quantity">Quantity</label>
            <div class="input-group text-center mb-3">
                <span class="input-group-text">-</span>
                <input type="text" name="quantity" value="1" class="form-control" />
                <span class="input-group-text">+</span>

            </div>
        </div>
        <div class="col md-10">
            <br>
            <button type="button" class="btn btn-success me-3 float-start" >Add to Wishlist</button>
            <button type="button" class="btn btn-primary me-3 float-start" >Add to Cart</button>
        </div>
    </div>
    </div>
        </div>
    </div>
</div>
@endsection
