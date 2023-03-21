@extends('Frontend.Frontend')
@section('title')
Welcome to Front End
@endsection


@section('content')

@include('layouts.inc.frontendSlider')

<div class="py-5">
<div class="container">
<div class="row">
    <h2>Trending Category</h2>
<div class="owl-carousel feature-carousel  owl-theme">
    @foreach ($category as $item)

    <div class="col-md-10">
        <a href="{{url('view-category/'.$item->slug)}}">
    <div class="card">
    <img src="{{asset('assests/upload/category/'.$item->image)}}" alt="all ok">

    <div class="card-body">
    <h5>{{$item->name}}</h5>
    <p>{{$item->description}}</p>
    </div>
    </div>
    </a>
    </div>

@endforeach
</div>
</div>
<div class="row">
    <h2>Trending Products</h2>
<div class="owl-carousel feature-carousel  owl-theme">
    @foreach ($products as $item)
    <div class="col-md-10">
    <div class="card">
    <img src="{{asset('assests/upload/product/'.$item->image)}}" alt="all ok">

    <div class="card-body">
    <h5>{{$item->name}}</h5>
    <small class="float-start">{{$item->selling_price}}</small>
    <small class="float-end"><s> {{$item->orignal_price}} </s></small>
    </div>
    </div>
    </div>
@endforeach
</div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script>
$('.feature-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
</script>
@endsection

