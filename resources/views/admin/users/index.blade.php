@extends('layouts.inc.admin')
@section('content')
 <div class="card">
    <div class="card-header">
        <h1>Users</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)

              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role_as=='1' ? 'Admin':'User'}}</td>
                </tr>
                @endforeach

            </tbody>
          </table>


    </div>
 </div>
@endsection
