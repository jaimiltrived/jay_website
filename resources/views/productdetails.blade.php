@extends('master')
@section('nav')
	<style>
		.booking-form {
			background: #fff8e1;
			border-radius: 12px;
			box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
			padding: 32px 24px 24px 24px;
			margin-bottom: 24px;
			border: 1px solid #ffe082;
		}

		.booking-form label {
			font-weight: 600;
			color: #b8860b;
		}

		.booking-form .form-control:focus {
			border-color: #ffc107;
			box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, .25);
		}

		.booking-form .btn-warning {
			font-weight: bold;
			letter-spacing: 1px;
			background: linear-gradient(90deg, #ffd54f 0%, #ffb300 100%);
			border: none;
			transition: background 0.3s;
		}

		.booking-form .btn-warning:disabled {
			background: #e0e0e0;
			color: #bdbdbd;
			border: none;
		}

		.booking-form .form-group {
			margin-bottom: 18px;
		}

		.booking-form input[readonly] {
			background: #f9f9f9;
		}
	</style>
	<div class="page-title-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page-title">
						<h3>Product Details</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- page-title-wrapper-end -->
	<!-- all-hyperion-page-start -->
	<div class="all-hyperion-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<!-- product-simple-area-start -->
					<div class="product-simple-area ptb-80">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
								<div class="tab-content">
									<div class="tab-pane active" id="view1">
										<a class="image-link"><img style="width:800px; height:800px"
												src="{{URL::to('/')}}/img/room/{{$data->product_image}}" alt=""></a>
									</div>
								</div>
								<!-- Nav tabs -->
								<ul class="sinple-tab-menu" role="tablist">
									@foreach($row->take(5) as $item)
										<li class="active">
											<a href="#view1" data-toggle="tab">
												<img style="width:79px; height:99px;"
													src="{{ URL::to('/') }}/img/room/{{ $item->product_image }}" alt="" />
											</a>
										</li>
									@endforeach
								</ul>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								<div class="product-simple-content">
									<div class="sinple-c-title">
										<h3>{{$data->product_name}}</h3>
									</div>
									<div class="checkbox">
										<span><i class="fa fa-check-square text-capitalize"
												aria-hidden="true"></i>{{$data->occupancy_status}}</span>
									</div>
									<div class="product-price-star star-2">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<span>(1Review)&nbsp;&nbsp;|&nbsp;&nbsp; Add Your Review </span>
									</div>
									<h4>Rs {{$data->new_price}}.00/Per Night</h4>
									<br />
									@php
										$disabled = (strtolower($data->occupancy_status) == 'booked' || strtolower($data->occupancy_status) == 'in maintenance') ? 'disabled' : '';
									@endphp


									<form id="bookingForm" class="booking-form" method="POST"
										action="{{ route('book.room') }}">
										@csrf
										<div class="form-group">
											<label for="checkin"><i class="fa fa-calendar"></i> Check-in Date:</label>
											<input type="date" class="form-control" id="checkin" name="checkin"  {{ $disabled }}>
											@error('checkin')
												<span class="text-danger small">{{ $message }}</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="checkout"><i class="fa fa-calendar"></i> Check-out Date:</label>
											<input type="date" class="form-control" id="checkout" name="checkout" 
												{{ $disabled }}>
											@error('checkout')
												<span class="text-danger small">{{ $message }}</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="phone"><i class="fa fa-phone"></i> Phone Number:</label>
											<input type="tel" class="form-control" id="phone" name="phone"
												pattern="[0-9]{10,15}" maxlength="15" placeholder="Enter your phone number"
												 {{ $disabled }}>
											@error('phone')
												<span class="text-danger small">{{ $message }}</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="nights"><i class="fa fa-moon-o"></i> Number of Nights:</label>
											<input type="text" class="form-control" id="nights" name="nights" readonly>
											@error('nights')
												<span class="text-danger small">{{ $message }}</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="total"><i class="fa fa-inr"></i> Total Price:</label>
											<input type="text" class="form-control" id="total" name="total" readonly>
											@error('total')
												<span class="text-danger small">{{ $message }}</span>
											@enderror
										</div>
										<input type="hidden" name="product_id" value="{{$data->id}}">
										@error('product_id')
											<span class="text-danger small">{{ $message }}</span>
										@enderror
										<button type="submit" class="btn btn-lg btn-warning col-sm-12" {{ $disabled }}>
											<span class="lnr lnr-cart"></span> Book Now
										</button>
									</form>
									@if($disabled)
										<div class="alert alert-warning mt-2">Room is not available for booking.</div>
									@endif

									<p>{{$data->discription}}</p>
								</div>
							</div>
						</div>
					</div>
					
					<!-- product-simple-area-end -->
					
					<div class="d-flex mb-3">
    <span class="me-5 fw-bold" id="showDetails" style="cursor:pointer;">Review</span>
    <span class="fw-bold" id="showReview" style="cursor:pointer;">Add Review</span>
	<hr/>
</div>

<!-- Room Details Section -->
<div id="detailsSection">
        <h5 class="mb-3">User Reviews</h5>
    <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="mb-1">John Doe</h6>
                    <small class="text-muted">2 days ago</small>
                </div>
                <div class="text-warning fs-3">
                    ★★★★☆
                </div>
            </div>
            <p class="mt-2 mb-0">Great room, clean and well maintained. Would definitely recommend!</p>
        </div>
    </div>
     <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="mb-1">Jane Smith</h6>
                    <small class="text-muted">1 week ago</small>
                </div>
                <div class="text-warning fs-3">
                    ★★★☆☆
                </div>
            </div>
            <p class="mt-2 mb-0">Decent stay, but the Wi-Fi speed needs improvement.</p>
        </div>
    </div>
</div>

<!-- Review Form Section -->
<div id="reviewSection" style="display:none;">
    <h5>Add a Review</h5>
    <form method="POST" action="{{ route('product.review', $data->id) }}">
        @csrf
        <div class="mb-2 mt-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror

            <label for="rating" class="mt-2">Rating</label>
            <select id="rating" name="rating" class="form-select" required>
                <option value="">Select rating</option>
                <option value="5">★★★★★</option>
                <option value="4">★★★★</option>
                <option value="3">★★★</option>
                <option value="2">★★</option>
                <option value="1">★</option>
            </select>
            @error('rating')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="reviewText">Review</label>
            <textarea id="reviewText" name="review" class="form-control" rows="3" required></textarea>
            @error('review')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>

				<hr>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="hyper-banner pt-80 pb-40">
							<div class="row">
								<div class="col-lg-12">
									<div class="single-banner">
										<a href="#"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- contact-area-start -->
		<div class="contact-area ptb-40">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mar_b-30">
						<div class="contuct-info text-center">
							<h4>Sign up for news & offers!</h4>
							<p>You may safely unsubscribe at any time</p>
						</div>
					
					</div>
					<div class="col-lg-6 col-md-8 col-sm-12 col-lg-offset-1 col-xs-12">
						<div class="search-box">
							<form action="#">
								<input type="email" placeholder="Enter your email address" />
								<button><span class="lnr lnr-envelope"></span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
	
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	
	
		<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<script>
			$(document).ready(function () {
				function calculateNights() {
					var checkin = $('#checkin').val();
					var checkout = $('#checkout').val();
					if (checkin && checkout) {
						var start = new Date(checkin);
						var end = new Date(checkout);
						var diffTime = end - start;
						var nights = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
						if (nights > 0) {
							$('#nights').val(nights);
							var price = {{$data->new_price}};
							$('#total').val((nights * price));
						} else {
							$('#nights').val('');
							$('#total').val('');
						}
					}
				}
				$('#checkin, #checkout').on('change', calculateNights);
			});



		
    document.getElementById("showDetails").onclick = function () {
        document.getElementById("detailsSection").style.display = "block";
        document.getElementById("reviewSection").style.display = "none";
    }

    document.getElementById("showReview").onclick = function () {
        document.getElementById("detailsSection").style.display = "none";
        document.getElementById("reviewSection").style.display = "block";
    }


		</script>

@endsection