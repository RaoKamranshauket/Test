@extends('layouts.inc.admin')
@section('content')
 <div class="card">
    <div class="card-header">
        <h1>Product</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Discription</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($product as $item)

              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->fetchCat->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->selling_price}}</td>
                <td>{{$item->description}}</td>
                <td>
              <img style="width: 100px" src="{{ url('/assests/upload/product/'.$item->image) }}"  alt="image here">
                </td>
                <td>
                    <a href="{{url('update-product/'.$item->id)}}">
                          <button class="btn btn-pimary">Edit</button>
                          </a>
                          <a href="{{url('delete-product/'.$item->id)}}">
                          <button class="btn btn-danger">Delete</button>

                          </a>
                        </td>
                </tr>
                @endforeach

            </tbody>
          </table>


    </div>
 </div>
@endsection
