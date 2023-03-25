@extends('Frontend.Frontend')
@section('title')
 View Orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header bg-color">
            <h5>  My  Order </h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Traking No</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{$item->tracking_no}}</td>
                            <td>{{$item->total_price}}</td>
                            <td>{{$item->status==0 ? 'Pending':'Completed'}}</td>
                            <td><a href="{{url('view-order-details/'.$item->id)}}" type="btn" class="btn btn-primary">View</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
