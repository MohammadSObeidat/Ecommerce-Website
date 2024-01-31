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
    <link rel="stylesheet" href="{{asset('css/template.css')}}">

    {{-- link javascript --}}
    <script src="{{asset('assets/js/script.js')}}"></script>
</head>

<body>
    @include('user.layout.header')

    <section id="about">
        <div class="about">
            <div class="title">
                <h1>About</h1>
            </div>
            <div class="container">
                <div class="content">
                    <div class="image">
                        <img src="{{asset('images/about.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h1>About Us</h1>
                        <p>
                            Our e-commerce project is a dynamic and modern online marketplace 
                            catering to a wide range of product categories, 
                            from fashion and electronics to home decor and beauty products. 
                            With a sleek and user-friendly interface, our website provides an 
                            immersive shopping experience for customers looking for 
                            high-quality products at competitive prices. We aim to be a one-stop 
                            destination for all your shopping needs, offering a diverse array of 
                            products to suit various lifestyles and preferences.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Category start -->
		<section id="category" class="blog">
			<div class="container">
				<div class="title">
                    <h1>Category</h1>
                </div>
				<div class="blog-content">
					<div class="row">
						@foreach ($categories as $category)
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

    <!--Product start -->
		<section id="product" class="new-arrivals">
			<div class="container">
				<div class="title">
                    <h1>New Product</h1>
                </div>
				<div class="new-arrivals-content">
					<div class="row">
						@foreach ($products as $product)
                        <div class="col-md-3 col-sm-4">
							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">
									<img src="{{asset($product->imagepath)}}" alt="new-arrivals images" style="max-height: 200px;min-height:200px;min-width:200px;max-width:200px">
									<div class="single-new-arrival-bg-overlay"></div>
									
									<div class="new-arrival-cart">
										<p style="margin-bottom: 10px">
											<span class="lnr lnr-cart"></span>
											<a href="{{route('buynow',['id'=>$product->id])}}" style="font-weight: bold">add <span>to </span> cart</a>
										</p>
										<p class="arrival-review pull-right">
                                            <a href="{{route('single_product',['id'=>$product->id])}}" style="font-weight: bold;margin-right: 10px;">See More</a>
										</p>
									</div>
								</div>
								<h4 style="margin-top: 15px">{{$product->name}}</h4>
								<p class="arrival-product-price"><span style="color: #e99c2e;">Price</span> {{$product->price}} $</p>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div><!--/.container-->
		
		</section>
	<!--Product end -->

    @include('user.layout.footer')
</body>
</html>