@extends('master')
@section('nav')
	<!doctype html>
	<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Home </title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<style>
			body {
				overflow-x: hidden;
				background-color: #f0ece4;
			}

			.about-text {
				text-align: center;
				padding: 0 35px;
			}

			.about-text p {
				color: #595960;
				font-weight: 500;
			}

			.about-text p.f-para {
				margin-bottom: 10px;
			}

			.about-text p.s-para {
				margin-bottom: 35px;
			}

			.about-text .about-btn {
				color: #19191a;
			}

			.about-pic img {
				min-width: 100%;
				border-radius: 10px;
			}

			.spad {
				padding-top: 60px;
				padding-bottom: 60px;
			}

			.section-title {
				text-align: center;
				margin-bottom: 22px;
			}

			.section-title span {
				font-size: 14px;
				color: #dfa974;
				font-weight: 700;
				text-transform: uppercase;
				letter-spacing: 2px;
			}

			.section-title h2 {
				font-size: 2rem;
				color: #19191a;
				line-height: 2.5rem;
				margin-top: 10px;
			}

			.blog-section.blog-page {
				padding-top: 0;
				padding-bottom: 40px;
			}

			.blog-section {
				padding-bottom: 40px;
			}

			.blog-section .section-title {
				margin-bottom: 36px;
			}

			.blog-item {
				height: 350px;
				position: relative;
				margin-bottom: 30px;
				border-radius: 8px;
				overflow: hidden;
			}

			.blog-item.small-size {
				height: 400px;
			}

			.blog-item .bi-text {
				position: absolute;
				left: 0;
				bottom: 25px;
				width: 100%;
				padding-left: 20px;
				padding-right: 20px;
			}

			.blog-item .bi-text .b-tag {
				display: inline-block;
				color: #fff;
				font-size: 12px;
				text-transform: uppercase;
				letter-spacing: 1px;
				background: #dfa974;
				padding: 3px 10px;
				border-radius: 2px;
			}

			.blog-item .bi-text h4 {
				margin-top: 18px;
				margin-bottom: 18px;
			}

			.blog-item .bi-text h4 a {
				color: #fff;
			}

			.blog-item .bi-text .b-time {
				font-size: 12px;
				color: #fff;
				text-transform: uppercase;
				letter-spacing: 3px;
			}

			.set-bg {
				background-repeat: no-repeat;
				background-size: cover;
				background-position: top center;
				height: 400px;
			}


			@media (max-width: 991.98px) {
				.about-pic img {
					margin-bottom: 20px;
				}

				.about-text {
					padding: 0 10px;
				}

				.section-title h2 {
					font-size: 1.5rem;
				}
			}

			@media (max-width: 767.98px) {
				.carousel-item img {
					height: 250px !important;
					object-fit: cover;
				}

				.about-pic img {
					margin-bottom: 10px;
				}

				.spad {
					padding-top: 30px;
					padding-bottom: 30px;
				}

				.blog-item,
				.blog-item.small-size {
					height: 200px;
				}
			}

			@media (max-width: 575.98px) {
				.about-text {
					padding: 0 5px;
				}

				.section-title h2 {
					font-size: 1.1rem;
				}
			}

			/* Card and product grid */
			.card-group {
				display: flex;
				flex-direction: column;
				align-items: center;
			}

			.card {
				border: none;
				border-radius: 10px;
				box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
				margin-bottom: 20px;
			}

			.product-content h3 {
				font-size: 1.1rem;
				font-weight: 700;
			}

			.product-price-star {
				color: #dfa974;
			}

			.price h4 {
				color: #19191a;
				font-size: 1.2rem;
			}

			.product-icon-wrapper {
				text-align: center;
				margin-bottom: 20px;
			}

			.product-icon ul {
				list-style: none;
				padding: 0;
				margin: 0;
				display: inline-flex;
				gap: 10px;
			}

			.product-icon ul li a {
				color: #dfa974;
				font-size: 1.2rem;
				transition: color 0.2s;
			}

			.product-icon ul li a:hover {
				color: #b8860b;
			}
		</style>
	</head>

	<body>
		<section>
			<div id="carouselExampleFade" class="carousel slide carousel-fade">
				<div class="carousel-inner">
					@foreach($banners as $key => $banner)
						<div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
							<img src="{{ asset("storage/banners/{$banner->slider_image}") }}" class="d-block w-100 img-fluid" style="height: 700px;"
								alt="Banner {{ $key + 1 }}">
						</div>
					@endforeach
				</div>

				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
					data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
					data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</section>

		  <section class="aboutus-section spad" style="margin-top:3%">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                        <div class="about-text">
                            <div class="section-title">
                                <div class="d-flex x flex-column"><span>{{ $contents->section_title }}</span>
                                    <h2>{{ $contents->hotel_name }}</h2>
                                </div>

                            </div>
                            <p class="f-para">{{ $contents->description }}</p>
                            <a href="#" class="btn btn-warning about-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-pic">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <img src="{{ asset("storage/hotel_images/{$contents->main_image}")  }}"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="col-6 mb-2">
                                    <img src="{{ asset("storage/hotel_images/{$contents->side_image}")  }}" class="img-fluid"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


		<div class="new-product-area hot-deal-area dotted-5 new-product-4 pt-4 pb-4">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title section-title-4">
							<h2>OUR ROOMS</h2>
						</div>
						<div class="row g-4">
							@foreach($row as $item)
								<div class="col-lg-4 col-md-6 col-sm-12 d-flex">
									<div class="card-group w-100">
										<div class="card w-100">
											<a href="{{route('product_details', $item->id)}}">
												<img src="{{URL::to('/')}}/img/room/{{$item->product_image}}"
													class="img-fluid card-img-top" style="height:220px; object-fit:cover;"
													alt="" />
											</a>
											<div class="product-content text-center p-3" style="background-color: #ffffff3d;">
												<a href="{{route('product_details', $item->id)}}">
													<h3>{{$item->product_name}}</h3>
												</a>
												<div class="product-price-star mb-2">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="price">
													<h4>Rs{{$item->new_price}}.00</h4>
												</div>
											</div>
										</div>
									</div>
									<div class="product-icon-wrapper">
										<div class="product-icon">
											<ul>
												<li><a href="#"><span class="lnr lnr-sync"></span></a></li>
												<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
												<li><a href="#"><span class="lnr lnr-cart"></span></a></li>
											</ul>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

		<section class="blog-section spad">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Our Blog & Event</h2>
						</div>
					</div>
				</div>
				<div class="row g-4">
					@foreach($blogs as $blog)
						<div class="col-lg-{{ $loop->iteration == 4 ? '8' : '4' }} col-md-6 col-sm-12">
							<div class="blog-item {{ $loop->iteration >= 4 ? 'small-size' : '' }} set-bg"
								data-setbg="{{ asset("storage/blogs/{$blog->image}") }}">
								<div class="bi-text">
									<span class="b-tag">{{ $blog->slug }}</span>
									<h4><a href="#">{{ $blog->name }}</a></h4>
									<div class="b-time">
										<i class="icon_clock_alt"></i>
										{{ \Carbon\Carbon::parse($blog->published_at)->format('dS F, Y') }}
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>


		<!-- contact-area-start -->


	</body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		$('.set-bg').each(function () {
			var bg = $(this).data('setbg');
			$(this).css('background-image', 'url(' + bg + ')');
		});
	</script>

	</html>
@endsection