@extends('layouts.inc.admin')
@section('content')
 <div class="card">
    <div class="card-head">
       <h2>Add Category </h2>
    </div>
    <div class="card-body">
     <form action="{{url('insert-category')}}" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
           <label for="">Name</label>
           <input type="text" class="form-control" name="name"  >
            </div>
            <div class="col-md-6 mb-3">
           <label for="">Slug</label>
           <input type="text" class="form-control" name="slug"  >
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Description</label>
                <textarea type="text" class="form-control" rows="3" name="description"  ></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox"  name="status"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox"  name="popular"  >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control"  name="meta_title"  >
                    </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea type="text" class="form-control" name="meta_descrip"  ></textarea>
                    </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea type="text" class="form-control"  name="meta_keywords"  ></textarea>
                    </div>

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
