@extends('master')
@section('nav')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4 border-0" style="max-width: 600px; margin: auto; background: #fdfdfd;">
        <h3 class="mb-4 text-center fw-bold text-primary">
            <i class="bi bi-cash-stack me-2"></i>Room Payment
        </h3>

        <form id="payment-form">
            @csrf <div class="mb-3">
                <label for="room_title" class="form-label fw-semibold">Room Title</label>
                <input type="text" name="room_title" class="form-control" value="{{ $room_data->product_name ?? '' }}" readonly>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label fw-semibold">Room Type</label>
                <input type="text" name="type" class="form-control" value="{{ $room_data->type ?? '' }}" readonly>
            </div>

            <div class="mb-3">
                <label for="nights" class="form-label fw-semibold">Number of Nights</label>
                <input type="number" name="nights" class="form-control" value="{{ $booking->nights ?? '' }}" readonly>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label fw-semibold">Amount (₹)</label>
                <input type="text" name="total_amount" id="total_amount" class="form-control" value="{{ $booking->total ?? '' }}" readonly>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label fw-semibold">Your Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ session('email') }}" required>
            </div>

            <button type="button" id="pay-button" class="btn btn-lg btn-primary w-100 rounded-3 shadow">
                <i class="bi bi-credit-card-fill me-2"></i>Proceed to Payment
            </button>
        </form>
    </div>
</div>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#pay-button').on('click', function(e) {
        e.preventDefault();

        var total_amount = $('#total_amount').val();
        var email = $('#email').val();
        var csrf_token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{ route('razorpay.pay') }}",
            type: 'POST',
            data: {
                _token: csrf_token,
                total_amount: total_amount,
                email: email
            },
            success: function(response) {
                var options = {
                    "key": response.key,
                    "amount": response.amount,
                    "currency": "INR",
                    "name": response.name,
                    "description": response.description,
                    "order_id": response.order_id,
                    "handler": function(paymentResponse) {
                        var form = $('<form action="{{ route('razorpay.callback') }}" method="POST"></form>');
                        form.append('<input type="hidden" name="_token" value="' + csrf_token + '">');
                        form.append('<input type="hidden" name="razorpay_payment_id" value="' + paymentResponse.razorpay_payment_id + '">');
                        form.append('<input type="hidden" name="razorpay_order_id" value="' + paymentResponse.razorpay_order_id + '">');
                        form.append('<input type="hidden" name="razorpay_signature" value="' + paymentResponse.razorpay_signature + '">');
                        
                        $('body').append(form);
                        form.submit();
                    },
                    "prefill": {
                        "email": response.prefill.email,
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };
                
                var rzp = new Razorpay(options);
                rzp.open();
            },
            error: function(xhr) {
                alert('An error occurred. Please try again.');
                console.log(xhr.responseText);
            }
        });
    });
});
</script>
@endsection