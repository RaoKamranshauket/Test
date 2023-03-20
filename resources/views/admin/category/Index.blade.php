@extends('layouts.inc.admin')
@section('content')
 <div class="card">
    <div class="card-header">
        <h1>Category</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Discription</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($category as $item)

              <tr>
                  <th scope="row">{{$item->id}}</th>
                  <td>{{$item->name}}</td>
                  <td>{{$item->description}}</td>
                  <td>

              <img style="width: 100px" src="{{ url('/assests/upload/category/'.$item->image) }}"  alt="image here">
                </td>
                <td>
                    <a href="{{url('update/'.$item->id)}}">
                          <button class="btn btn-pimary">Edit</button>
                          </a>
                          <a href="{{url('delete/'.$item->id)}}">
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
