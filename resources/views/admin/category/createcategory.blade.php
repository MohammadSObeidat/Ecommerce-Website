@extends('admin.layout.dashboard')

@section('content')
    <h3 class="fw-bold mt-3 p-3"><span style="color: #ababab">Page/</span> Add Category</h3>
    <div class="card p-5 border-0 shadow">
          <div class="title">
              <h3 class="fw-bold mb-5">Create New Category</h3>
          </div>
          <form action="{{route('storecategory')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row g-4">
                  <div class="col-12">
                      <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                      @error('name')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                  </div>
                  <div class="col-12">
                      <textarea name="description" class="form-control" rows="5" placeholder="Description">{{old('name')}}</textarea>
                  </div>
                  <div class="col-12">
                      <input type="file" name="photo" class="form-control @error('name') is-invalid @enderror">
                      @error('photo')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                  </div>
                  <div class="col-12">
                      <button class="btn btn-primary w-100">Add Category</button>
                  </div>
              </div>
          </form>
    </div>
@endsection