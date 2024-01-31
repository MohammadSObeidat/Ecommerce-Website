@extends('admin.layout.dashboard')

@section('content')
    <h3 class="fw-bold mt-3 p-3"><span style="color: #ababab">Page/</span> Add Product</h3>
    <div class="card p-5 border-0 shadow">
        <div class="title">
            <h3 class="fw-bold mb-5">Create New Product</h3>
        </div>
        <form action="{{route('storeproduct')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-12">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6">
                    <input type="number" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6">
                    <input type="number" name="qty" value="{{old('qty')}}" class="form-control @error('qty') is-invalid @enderror" placeholder="Quantity">
                    @error('qty')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <textarea name="description" class="form-control" rows="5" placeholder="Description">{{old('name')}}</textarea>
                </div>
                <div class="col-12">
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="" selected>Select...</option>
                        @foreach ($categories as $category)
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
                <div class="col-12">
                    <button class="btn btn-primary w-100">Add Product</button>
                </div>
            </div>
        </form>
    </div>
@endsection