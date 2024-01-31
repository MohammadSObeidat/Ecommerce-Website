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
    <link rel="stylesheet" href="{{asset('css/template.css')}}">
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
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
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
                                <li><a href={{route('about')}}>About</a></li>
                                <li><a href="{{route('category')}}">Category</a></li>
                                <li><a href="{{route('product')}}">Product</a></li>
                                <li><a href={{route('contactus')}}>Contact</a></li>
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

    <div class="space" style="margin-top: 50px"></div>

     <!--Category start -->
		<section id="category" class="blog">
			<div class="container">
				<div class="title">
                    <h1>Category</h1>
                </div>
				<div class="blog-content">
					<div class="row">
						@foreach ($allCategory as $category)
                        <div class="col-sm-4">
							<div class="single-blog">
								<a href="{{route('subcategory',['id'=>$category->id])}}">
                                    <div class="single-blog-img">
                                        <img src="{{asset($category->imagepath)}}" alt="blog image" style="max-height: 250px;min-height:250px;min-width:360px;max-width:360px">
                                        <div class="single-blog-img-overlay"></div>
                                    </div>
                                </a>
								<div class="single-blog-txt">
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, eveniet!</p>
									<h1 class="text-center" style="margin-top: 15px">{{$category->name}}</h1>
								</div>
							</div>
							
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</section>
	<!--Category end -->
    

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