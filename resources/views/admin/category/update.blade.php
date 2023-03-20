@extends('layouts.inc.admin')

@section('content')

<div class="card">

<div class="card-header">
    <h1>Update Category </h1>
</div>

<div class="card-body">

<form action="{{url('update/'.$cus->id)}}"  enctype="multipart/form-data" method="POST" >
@csrf
<div class="row">

<div class="col-md-6 mb-3">
<label for="">Name</label>
<input type="text" class="form-control" value="{{$cus->name}}" name="name" >
</div>

<div class="col-md-6 mb-3">
<label for="">Slug</label>
<input type="text" class="form-control" value="{{$cus->slug}}" name="slug" >
</div>

<div class="col-md-12 mb-3">
<label for="">Description</label>
<textarea type="text" class="form-control" rows="3" name="description" >{{$cus->description}}</textarea>
</div>

<div class="col-md-6 mb-3">
    <label for="">Status</label>
    <input type="checkbox" {{$cus->status == "1" ? 'checked':''}} name="status" >
</div>


<div class="col-md-6 mb-3">
    <label for="">Popular</label>
<input type="checkbox" {{$cus->popular=="1" ? 'checked':''}}  name="popular" >
</div>

    <div class="col-md-12 mb-3">
    <label for="">Meta Title</label>
    <input type="text" class="form-control" value="{{$cus->meta_title}}"  name="meta_title" >
    </div>

    <div class="col-md-12 mb-3">
    <label for="">Meta Keywords</label>
    <textarea type="text" class="form-control" rows="3"   name="meta_keywords" >{{$cus->meta_keywords}}</textarea>
    </div>

    <div class="col-md-12 mb-3">
<label for="">Meta Description</label>
<textarea type="text" class="form-control" rows="3"   name="meta_descrip" >{{$cus->meta_descrip}}</textarea>
</div>
@if ($cus->image)
<img style="width: 200px" src="{{asset('/assests/upload/category/'.$cus->image)}}">

@endif
<div class="col-md-12 mb-3">
<label for="">Image</label>
<input type="file" class="form-control"  name="image" >
</div>

<div class="col-md-12">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</div>
</form>

</div>
</div>

@endsection
