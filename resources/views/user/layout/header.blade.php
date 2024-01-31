<header id="home" class="welcome-hero">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!--/.carousel-inner -->
        <div class="carousel-inner" role="listbox">
            <!-- .item -->
            <div class="item active">
                <div class="single-slide-item slide1">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h4>great design collection</h4>
                                            <h2>Online Shopping</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip. 
                                            </p>
                                            <button class="btn-cart welcome-add-cart" onclick="window.location.href='{{route('about')}}'">
                                                <span class="lnr lnr-plus-circle"></span>
                                                more info
                                            </button>
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                                <div class="col-sm-6">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="{{asset('images/shop-removebg-preview.png')}}" alt="slider image" style="min-width:500px;max-width:500px;min-height: 400px;max-height:400px">
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->
            </div><!-- /.item .active-->
        </div><!-- /.carousel-inner-->
    </div><!--/#header-carousel-->

    <!-- top-area Start -->
    <div class="top-area">
        <div class="header-area">
            <!-- Start Navigation -->
            <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            <form action="{{route('search')}}" method="post" style="display: flex">
                                @csrf
                                <input type="text" name="search" class="form-control" placeholder="Search" style="width: 1000px">
                                <button><span class="input-group-addon"><i class="fa fa-search"></i></span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->

                <div class="container">            
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="search">
                                <a href=""><span class="lnr lnr-magnifier"></span></a>
                            </li><!--/.search-->
                            <li class="dropdown">
                                <a href="{{route('cart')}}" class="dropdown-toggle" data-toggle="dropdown" >
                                    <span id="cart" class="lnr lnr-cart"></span>
                                </a>
                            </li>
                            <li>
                                @guest
                                    @if (Route::has('login'))
                                        <a href="{{route('login')}}">Login</a>
                                    @endif
                                    @else
                                        <a href="{{route('userlogout')}}">Log Out</a>
                                @endguest
                            </li>
                        </ul>
                    </div><!--/.attr-nav-->
                    <!-- End Atribute Navigation -->

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{route('homepage')}}">e-shopper</a>

                    </div><!--/.navbar-header-->
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class=" scroll active"><a href="#home">Home</a></li>
                            <li class="scroll"><a href="#about">About</a></li>
                            <li class="scroll"><a href="#category">Category</a></li>
                            <li class="scroll"><a href="#product">Product</a></li>
                            <li><a href="{{route('contactus')}}">Contact</a></li>
                            <li>
                                @auth
                                    <a href="#" style="color: red;">{{Auth::user()->name}}</a>
                                @endauth
                            </li>                            
                        </ul><!--/.nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!--/.container-->
            </nav><!--/nav-->
            <!-- End Navigation -->
        </div><!--/.header-area-->
        <div class="clearfix"></div>

    </div><!-- /.top-area-->
    <!-- top-area End -->

</header>