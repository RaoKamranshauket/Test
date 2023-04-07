@extends('Frontend.Frontend')
@section('title')
 Wish List
@endsection


@section('content')
<div class="py-3 mb-5 shadow-sm bg-warning  border-top">
    <div class="container">
        <h6 class="mb-0" >
           <a   href="{{url('/')}}">Home</a>
            /Wishlist</h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow product">
        <div class="card-body ">
            @if ($wishList->count() > 0)
            @foreach ($wishList as $item)
            <div class="row product mt-4 border">
                <div class="col-md-2 mt-2">
                <img src="{{asset('assests/upload/product/'.$item->products->image)}}" style="height: 70px;width:70px" alt="all ok">
            </div>
     <div class="col-md-3 mt-2">
        <h3>{{$item->products->name}}</h3>
        </div>
        <div class="col-md-3 mt-2">
            <input type="hidden" value="{{$item->products->id}}" class="pro_id">
            @if ($item->products->qty >=1)
            <input type="hidden" value="1" class="qty">
            <h5 class="mt-2">In Stock</h5>
             </div>
             <div class="col-md-2 mt-2">
                <button type="button" class="btn btn-success addCart" >Add to Cart<i class="fa fa-shopping-cart"></i></button>

             @else
<h5 class="mt-2">Out of Stock</h5>
@endif
         </div>

         <div class="col-md-2 mt-2">

            <button type="button" class="btn btn-danger rmWishList-btn" >Remove<i class="fa fa-trash"></i></button>
            </div>
        </div>

        @endforeach

        @else
        <h4>Your <i class="fa fa-shopping-cart"></i>WhishList is empty</h4>
        <a href="{{url('category')}}" type="btn" class="btn btn-outline-primary float-end">Continue Shoping</a>
        </div>
@endif
</div>
        </div>
        </div>
        @endsection
