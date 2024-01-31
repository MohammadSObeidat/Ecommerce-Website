<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--font-family-->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i')}}" rel="stylesheet">
    
    <!-- title of site -->
    <title>e-shopper</title>
    <!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="{{asset('assets/logo/favicon.png')}}"/>
   
    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!--linear icon css-->
	<link rel="stylesheet" href="{{asset('assets/css/linearicons.css')}}">
	<!--animate.css-->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!--owl.carousel.css-->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
	
    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	
	<!-- bootsnav -->
	<link rel="stylesheet" href="{{asset('assets/css/bootsnav.css')}}" >	
    
    <!--style.css-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
    <!--responsive.css-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    
    {{-- link css --}}
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
</head>

<body>
    <header id="home" class="welcome-hero">
        <!-- top-area Start -->
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000" style="background-color: #f8f9fd">

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
                                    <a href="#"><span class="lnr lnr-magnifier"></span></a>
                                </li><!--/.search-->
                                <li class="dropdown">
                                    <a href="{{route('cart')}}" class="dropdown-toggle" data-toggle="dropdown" >
                                        <span class="lnr lnr-cart"></span>
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
                            <a class="navbar-brand" href="{{route("homepage")}}">e-shopper</a>

                        </div><!--/.navbar-header-->
                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                                <li><a href="{{route("homepage")}}">Home</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="{{route('category')}}">Category</a></li>
                                <li><a href="{{route('product')}}">Product</a></li>
                                <li class="scroll"><a href="#contact">Contact</a></li>
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

    <div class="space" style="margin-top: 150px"></div>
    
    <img src="{{asset('images/contact.jpg')}}" style="width: 100%;height:400px" alt="">

    <div class="container" id="contact">
        <form action="{{route('storecontactus')}}" method="post">
            @csrf
            <div class="title">
                <h1>Contact Us</h1>
            </div>
            @if (session('success'))
                <p class="alert alert-success" style="width: 1080px;margin-top: 10px;">{{session('success')}}</p>
            @endif
            <div class="form">
                <div class="input">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="input">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email Address">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="input">
                    <input type="text" name="subject" value="{{old('subject')}}" class="form-control" placeholder="Subject">
                    @error('subject')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="input">
                    <input type="number" name="number" value="{{old('number')}}" class="form-control" placeholder="Phone Number">
                    @error('number')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="input" style="width: 1080px">
                    <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Message">{{old('message')}}</textarea>
                    @error('message')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="btn">
                <button class="btn btn-primary">Send Message</button>
            </div>
        </form>
    </div>

     <!--newsletter strat -->
	<section id="newsletter"  class="newsletter">
		<div class="container">
			<div class="hm-footer-details">
				<div class="row">
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>information</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">About us</a></li><!--/li-->
									<li><a href="#">Category</a></li><!--/li-->
									<li><a href="#">Product</a></li><!--/li-->
									<li><a href="#">Contact Us</a></li><!--/li-->
								</ul><!--/ul-->
							</div><!--/.hm-foot-menu-->
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>collections</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Electronic</a></li><!--/li-->
									<li><a href="#">Chair</a></li><!--/li-->
									<li><a href="#">Clothes</a></li><!--/li-->
								</ul><!--/ul-->
							</div><!--/.hm-foot-menu-->
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>my accounts</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">my account</a></li><!--/li-->
									<li><a href="#">wishlist</a></li><!--/li-->
									<li><a href="#">Community</a></li><!--/li-->
									<li><a href="#">order history</a></li><!--/li-->
									<li><a href="#">my cart</a></li><!--/li-->
								</ul><!--/ul-->
							</div><!--/.hm-foot-menu-->
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
					<div class=" col-md-3 col-sm-6  col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>newsletter</h4>
							</div><!--/.hm-foot-title-->
							<div class="hm-foot-para">
								<p>
									Subscribe  to get latest news,update and information.
								</p>
							</div><!--/.hm-foot-para-->
							
						</div><!--/.hm-footer-widget-->
					</div><!--/.col-->
				</div><!--/.row-->
			</div><!--/.hm-footer-details-->
		</div><!--/.container-->
	</section>	
	<!--newsletter end -->

    <!--footer start-->
	<footer id="footer"  class="footer">
		<div class="container">
			<div class="hm-footer-copyright text-center">
				<div class="footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>	
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>	
				</div>
				<p>
					&copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
				</p><!--/p-->
			</div><!--/.text-center-->
		</div><!--/.container-->
		<div id="scroll-Top">
			<div class="return-to-top">
				<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
			</div>
			
		</div><!--/.scroll-Top-->
		
    </footer>
	<!--footer end-->
   


    <script src="{{asset('assets/js/jquery.js')}}"></script>  
        <!--modernizr.min.js-->
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js')}}"></script>		
		<!--bootstrap.min.js-->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<!-- bootsnav js -->
	<script src="{{asset('assets/js/bootsnav.js')}}"></script>
		<!--owl.carousel.js-->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

	<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js')}}"></script>
        <!--Custom JS-->
    <script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>