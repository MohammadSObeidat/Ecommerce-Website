@extends('admin.layout.dashboard')

@section('content')
<div class="d-flex justify-content-center mt-3">
    <div class="row w-100 m-5">
        <h1 class="fw-bold mb-5">All Category</h1>
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
                      <th scope="col">Description</th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                      <tr>
                        <th scope="row">{{$id++}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td><img src="{{asset($category->imagepath)}}" alt="" style="max-height: 50px;min-height:50px;max-width:100px;min-width:100px"></td>
                        <td class="d-flex justify-content-center gap-4 p-3 text-center">
                            <a href="{{route('editcategory',['id'=>$category->id])}}" class="btn btn-secondary">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>
                            <div class="form">
                                <form action="{{route('deletecategory',['id'=>$category->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return(confirm('Are your sure you want to delete the category'))">
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
@endsection