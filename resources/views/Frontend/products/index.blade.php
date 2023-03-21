@extends('Frontend.Frontend')
@section('title')
Welcome to Front End
@endsection


@section('content')
<div class="py-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$category->name}}</h2>
            <div class="row">
                @foreach ($product as $item)
                <div class="col-md-3 mb-3">
                    <a href="{{url('view-product/'.$category->slug.'/'.$item->slug)}}">
                    <div class="card">
                    <img src="{{asset('assests/upload/product/'.$item->image)}}" alt="all ok">

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
        </div>
        </div>
        </div>
@endsection
