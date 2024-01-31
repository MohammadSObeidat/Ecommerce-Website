@extends('admin.layout.dashboard')

@section('content')
<div class="card">
    <div class="card-header text-center">
        <h2 class="fw-bold">Edit Category</h2>
    </div>
    <div class="card-body">
        <form action="{{route('updatecategory',['category'=>$category->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row g-4">
                <div class="col-12">
                    <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <textarea name="description" value="{{$category->description}}" class="form-control" rows="5" placeholder="Description"></textarea>
                </div>
                <div class="col-12">
                    <input type="file" name="photo" class="form-control @error('name') is-invalid @enderror">
                    @error('photo')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="image">
                    <img src="{{asset($category->imagepath)}}" alt="" style="max-height: 167px;min-height:167px;max-width:250px;min-width:250px">
                </div>
                <div class="col-12 d-flex justify-content-end gap-4">
                    <a href="{{route('allcategory')}}" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection