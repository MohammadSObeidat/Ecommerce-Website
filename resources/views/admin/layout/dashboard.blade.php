<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="row">
        <div class="col-3 p-0">
            <div class="sidebar">
                <ul>
                    <li class="image">
                        <img src="https://www.pngmart.com/files/21/Account-User-PNG.png" alt="">
                        <h2>
                            @auth
                                {{Auth::user()->name}}
                            @endauth
                        </h2>
                    </li>
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('allcategory')}}">
                            <i class="fas fa-table"></i>
                            <p>All Category</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('addcategory')}}">
                            <i class="fas fa-pen"></i>
                            <p>Add Category</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('allproduct')}}">
                            <i class="fas fa-table"></i>
                            <p>All Products</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('addproduct')}}">
                            <i class="fas fa-pen"></i>
                            <p>Add Products</p>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="{{route('logout')}}">
                            <i class="fas fa-sign-out"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-8 d-flex flex-column p-0 min-vh-100" style="background-color: #f6fafd;">
            <div class="header d-flex justify-content-between bg-white p-2">
                <h2 class="text-black">Dashboard</h2>
                <form action="{{route('searchproduct')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col d-flex gap-2">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="content flex-grow-1">
                @yield('content')
            </div>

            <div class="footer bg-white p-2">
                <p class="text-black text-center">@ copy 2023 Ecommerce. All Rights Mohammad</p>
            </div>
        </div>
    </div>
</body>
</html>