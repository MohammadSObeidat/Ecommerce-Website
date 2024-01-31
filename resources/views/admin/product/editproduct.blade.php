@extends('admin.layout.dashboard')

@section('content')
<div class="card">
    <div class="card-header text-center">
        <h2 class="fw-bold">Edit Product</h2>
    </div>
    <div class="card-body">
        <form action="{{route('updateproduct',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row g-4">
                <div class="col-12">
                    <input type="text" name="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6">
                    <input type="number" name="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6">
                    <input type="number" name="qty" value="{{$product->qty}}" class="form-control @error('qty') is-invalid @enderror" placeholder="Quantity">
                    @error('qty')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <textarea name="description" class="form-control" rows="5" placeholder="Description">{{$product->description}}</textarea>
                </div>
                <div class="col-12">
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                            @if ($category->id === $product->category_id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @endif
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <input type="file" name="photo" class="form-control @error('name') is-invalid @enderror">
                    @error('photo')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="image">
                    <img src="{{asset($product->imagepath)}}" alt="" style="max-height: 167px;min-height:167px;max-width:250px;min-width:250px">
                </div>
                <div class="col-12 d-flex justify-content-end gap-4">
                    <a href="{{route('allproduct')}}" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection