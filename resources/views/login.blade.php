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
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-5">
                    <div class="card p-5">
                        <form action="{{route('signin')}}" method="post">
                            @csrf
                            <div class="title">
                                <h1 class="text-center fw-bold mb-4">Login</h1>
                            </div>
                            @if (session('success'))
                                <p class="alert alert-success">{{session('success')}}</p>
                            @endif
                            @if (session('norecord'))
                                <p class="alert alert-danger">{{session('norecord')}}</p>
                            @endif
                            <div class="row g-4">
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                                    @error('email')
                                        <p class="text-danger" style="margin-bottom:0px">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                                    @error('password')
                                        <p class="text-danger" style="margin-bottom:0px">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-danger w-100">Login</button>
                                </div>
                                <p class="fw-bold">Don't Have An Account? <a href="{{route('userregister')}}">Register Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="image">
                        <img src="{{asset('images/login11-removebg-preview.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>