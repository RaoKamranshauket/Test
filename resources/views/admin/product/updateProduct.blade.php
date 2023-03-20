@extends('layouts.inc.admin')
@section('content')
 <div class="card">
    <div class="card-head">
      <h2>  Update Product </h2>
    </div>
    <div class="card-body">
     <form action="{{url('update-product/'.$pro->id)}}" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <select name="cate_id" class="form-control" >
                    <option value="{{$pro->fetchCat->id}}" selected>{{$pro->fetchCat->name}}</option>
                    @foreach ($category as $item)
                   <option value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
                  </select>
                 </div>
            <div class="col-md-6 mb-3">
           <label for="">Name</label>
           <input type="text" class="form-control" value="{{$pro->name}}" name="name"  >
            </div>
            <div class="col-md-6 mb-3">
           <label for="">Slug</label>
           <input type="text" class="form-control" value="{{$pro->slug}}" name="slug"  >
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Small Description</label>
                <textarea type="text" class="form-control" rows="3" name="small_description"  >{{$pro->slug}}"</textarea>
                </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea type="text" class="form-control" rows="3" name="description"  >{{$pro->slug}}"</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Orignal Price</label>
                    <input type="number" value="{{$pro->orignal_price}}" class="form-control" name="orignal_price"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" value="{{$pro->selling_price}}" class="form-control" name="selling_price"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" value="{{$pro->qty}}" class="form-control" name="qty"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" value="{{$pro->tax}}" class="form-control" name="tax"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$pro->status=="1" ? 'checked':''}} name="status"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" {{$pro->trending=="1" ? 'checked':''}} name="trending"  >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" value="{{$pro->meta_title}}" name="meta_title"  >
                    </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" class="form-control"  name="meta_descrip"  >{{$pro->meta_descrip}}</textarea>
                    </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" class="form-control"   name="meta_keywords"  >{{$pro->meta_keywords}}</textarea>
                    </div>
                    @if ($pro->image)
                    <img style="width: 200px" src="{{asset('/assests/upload/product/'.$pro->image)}}">

                    @endif
                <div class="col-md-12 mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control"  name="image"  >
                    </div>
                    <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
        </div>
     </form>
    </div>
 </div>
@endsection
