<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"/>
	<link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{URL::to('/')}}/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{URL::to('/')}}/css/responsive.css" />
	<link rel="stylesheet" href="{{URL::to('/')}}/css/style.css" />
	<style>
		body {
			overflow: x-hidden;
		}

		.logo {
			font-weight: bold;
			color: #1B1212 !important;
			margin-right: 30px;
			flex-shrink: 0;
		}

		.navbar,
		.navbar a,
		.nav,
		.nav a {
			color: #000 !important;
		}


		.mobile {
			display: none !important;
		}

		@media (max-width:992px) {
			.mobile {
				display: block !important;

			}

			.laptop {
				display: none !important;
			}
		}
	</style>
</head>


<body>
	<nav class="navbar navbar-expand-lg laptop text-dark" style="height: 80px; background-color: #fff8f0;">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
				aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item fs-4">
						Lords Inn Hotel
					</li>
				</ul>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-dark" style="margin-left:10%;">
					<li class="nav-item">
						<a class="nav-link navbar-brand" aria-current="page" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navbar-brand" href="/shop">Rooms</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navbar-brand" href="/about">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navbar-brand" href="/contact">Contact us</a>
					</li>
				</ul>
				<form class="d-flex" role="search" action="{{ route('products.index') }}" method="GET">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q"
						value="{{ request('q') }}">
					<button class="btn btn-dark" type="submit">Search</button>
				</form>

				@if(session('email'))
					<li class="nav-item ms-2" style="list-style: none; ">
						<a class="nav-link navbar-brand" aria-current="page" href="{{ route('logout') }}">Logout</a>
					</li>
					<li class="nav-item ms-2" style="list-style: none; ">
						<a class="nav-link navbar-brand" aria-current="page" href="{{ route('profile') }}"><i
								class="fa-solid fa-user"></i></a>
					</li>
				@else
					<li class="nav-item ms-2" style="list-style: none; ">
						<a class="nav-link navbar-brand" aria-current="page" href="{{ route('login') }}">Login</a>
					</li>
				@endif

			</div>
		</div>
	</nav>

	<nav class="navbar  fixed-top  mobile" style="background-color: #fff8f0;">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
				aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
				aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Lords Inn Hotel</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0  text-dark">
						<li class="nav-item">
							<a class="nav-link navbar-brand" aria-current="page" href="/">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-brand" href="/shop">Rooms</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-brand" href="/about">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-brand" href="/contact">Contact us</a>
						</li>
						<li class="nav-item" style="list-style: none; ">
							<a class="nav-link navbar-brand" aria-current="page" href="{{ route('login') }}">Login</a>
						</li>
					</ul>
					<form class="d-flex" role="search" action="{{ route('products.index') }}" method="GET">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q"
							value="{{ request('q') }}">
						<button class="btn btn-dark" type="submit">Search</button>
					</form>

				</div>
			</div>
		</div>
	</nav>
	<!-- header-end -->
	<!-- mainmenu-area-start -->

	@yield('nav')
	<div class="footer-area footer-area-4 ptb-80" style="background-color: #fff8f0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 mar_b-30">
					<div class="footer-wrapper">

						<p>We are a team of designers and developers that create high quality Magento, Prestashop,
							Opencart themes and provide premium and support to our products.</p>
						<ul>
							<li>
								<span>Address : </span> Delhi india
							</li>
							<li>
								<span>Phone: </span> 123445689
							</li>
							<li>
								<span>Email:</span> <a href="#">admin@dsfbvbbdvgz.company</a>
							</li>
						</ul>
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-flickr"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 hidden-sm col-xs-12 mar_b-30">
					<div class="footer-wrapper">
						<div class="footer-title">
							<a href="#">
								<h3>Quick links</h3>
							</a>
						</div>
						<div class="footer-wrapper">
							<ul class="usefull-link">
								<li><a href="/">Home</a></li>
								<li><a href="/shop">Rooms</a></li>
								<li><a href="/about">About us</a></li>
								<li><a href="/contact">Contact us</a></li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 hidden-md hidden-sm col-xs-12 mar_b-30">
					<div class="footer-wrapper">
						<div class="footer-title">
							<a href="#">
								<h3>Contact</h3>
							</a>
						</div>
						<div class="footer-wrapper">
							<ul class="usefull-link">
								<li><a href="#">Email: supoort@lordsinn.com</a></li>
								<li><a href="tel:9876543210">Phone: +91 9876543210</a></li>
								<li><a href="#">Address: MG Road , Ahemdabad , india</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div class="footer-wrapper">
						<div class="footer-title">
							<a href="#">
								<h3>useful links</h3>
							</a>
						</div>
						<div class="footer-wrapper">
							<ul class="usefull-link">
								<li><a href="#">Contact us</a></li>
								<li><a href="#">Site map</a></li>
								<li><a href="#">About us</a></li>
								<li><a href="#">Specials</a></li>
								<li><a href="#">My Cart</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Custom service</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/vendor/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!-- meanmenu js -->
	<script src="js/jquery.meanmenu.js"></script>
	<!-- jquery-ui js -->
	<script src="js/jquery-ui.min.js"></script>
	<!-- nivo.slider js -->
	<script src="js/jquery.nivo.slider.js"></script>
	<!-- magnific-popup js -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- wow js -->
	<script src="js/wow.min.js"></script>
	<!-- scrolly js -->
	<script src="js/jquery.scrolly.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script>
	$(document).ready(function () {
		$('#search-input').on('keyup', function () {
			var query = $(this).val();

			if (query.length > 1) {
				$.ajax({
					url: "{{ route('search') }}",
					method: 'GET',
					data: { query: query },
					success: function (data) {
						let suggestions = '';
						data.forEach(function (product) {
							suggestions += `<div class="suggestion-item">${product.pro_name}</div>`;
						});
						$('#suggestions').html(suggestions).show();
					}
				});
			} else {
				$('#suggestions').hide();
			}
		});

		// Hide suggestions when input loses focus
		$('#search-input').on('blur', function () {
			setTimeout(function () {
				$('#suggestions').hide();
			}, 200);
		});

		// Fill input when suggestion is clicked
		$(document).on('click', '.suggestion-item', function () {
			$('#search-input').val($(this).text());
			$('#suggestions').hide();
		});
	});
</script>