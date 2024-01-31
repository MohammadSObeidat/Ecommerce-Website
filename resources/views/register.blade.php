<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1><a href="{{route('homepage')}}">E-Shopper</a></h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('userregister')}}">Register</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="content vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-7 d-flex justify-content-start">
                    <div class="image">
                        <img src="{{asset('images/register11-removebg-preview.png')}}" alt="" style="width: 500px">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card p-5">
                        <form action="{{route('usersignup')}}" method="post">
                            @csrf
                            <div class="title">
                                <h1 class="text-center fw-bold mb-4">Register</h1>
                            </div>
                            <div class="row g-4">
                                <div class="col-12">
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Name">
                                    @error('name')
                                        <p class="text-danger" style="margin-bottom:0px">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Your Email">
                                    @error('email')
                                        <p class="text-danger" style="margin-bottom:0px">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter Your Password">
                                    @error('password')
                                        <p class="text-danger" style="margin-bottom:0px">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-danger w-100">Register</button>
                                </div>
                                <p class="fw-bold">Already have an account? <a href="{{route('login')}}">Login Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>