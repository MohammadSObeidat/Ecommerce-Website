@extends('admin.layout.dashboard')

@section('content')
<div class="d-flex justify-content-center mt-3">
    <div class="row w-100 m-5">
        <h1 class="fw-bold mb-5">All Product</h1>
        @if (session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif
        <div class="col-12">
            @php
                $id = 1
            @endphp
            <table class="table text-center">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">price</th>
                      <th scope="col">qty</th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                      <tr>
                        <th scope="row">{{$id++}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->qty}}</td>
                        <td><img src="{{asset($product->imagepath)}}" alt="" style="max-height: 50px;min-height:50px;max-width:100px;min-width:100px"></td>
                        <td class="d-flex justify-content-center gap-4 p-3 text-center">
                            <a href="{{route('editproduct',['id'=>$product->id])}}" class="btn btn-secondary">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>
                            <div class="form">
                                <form action="{{route('deleteproduct',['id'=>$product->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return(confirm('Are your sure you want to delete the product'))">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center mx-5">
    {{$products->links()}}
</div>
@endsection