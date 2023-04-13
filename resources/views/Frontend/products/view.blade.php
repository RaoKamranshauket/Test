@extends('Frontend.Frontend')
@section('title')
    {{ $category->name }}
@endsection


@section('content')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ $product->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
    <div class="py-3 mb-5 shadow-sm bg-warning  border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">Collections</a>
                /<a href="{{ url('view-category/' . $product->fetchCat->slug) }}"> {{ $product->fetchCat->name }}</a>
                /{{ $product->name }}
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow">
            <div class="card-body product">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assests/upload/product/' . $product->image) }}" class="w-100" alt="all ok">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if ($product->trending == '1')
                            <label style="font-size:16px;" class="float-end badge bg-danger tranding_tag">Trending</label>
                           @endif
                        </h2>

                        <hr>
                        <label class="me-3">Orignal Price : <s>Rs {{ $product->orignal_price }}</s></label>
                        <label class="fw-bold">Selling Price : Rs {{ $product->selling_price }}</label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if ($product->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col md-2 qt">
                                <input type="hidden" value="{{ $product->id }}" class="pro_id">
                                <input type="hidden" value="{{$product->qty}}" class="pro_qty">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px">
                                    <span class="input-group-text decrement-btn">-</span>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control qty text-center" />
                                    <span class="input-group-text increment-btn">+</span>

                                </div>
                            </div>
                            <div class="col md-10">
                                <br>
                                <button type="button" class="btn btn-success addWishList me-3 float-start">Add to Wishlist <i
                                        class="fa fa-heart"></i> </button>
                                        @if ($product->qty > 0)
                                <button type="button" class="btn btn-primary addCart me-3 float-start">Add to Cart <i
                                        class="fa fa-shopping-cart"></i></button>
                                        @endif
                            </div>
                        </div>
                    </div>
                </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Rate Product
</button>


            </div>
        </div>
    @endsection


