<form action="{{ route('razorpay.callback') }}" method="POST">
    @csrf
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $data['key'] }}"
        data-amount="{{ $data['amount'] }}" data-currency="INR" data-order_id="{{ $data['order_id'] }}"
        data-buttontext="Pay Now" data-name="Room Booking" data-description="Room Payment"
        data-prefill.name="{{ session('email')}}" data-prefill.email="{{ session('email') }}"
        data-theme.color="#0d6efd"></script>
    <input type="hidden" name="email" value="{{ $request->email }}">
    <input type="hidden" name="room_id" value="{{ $request->room_id }}">
    <input type="hidden" name="nights" value="{{ $request->nights }}">
    <input type="hidden" name="total_amount" value="{{ $request->total_amount }}">
    <input type="hidden" name="razorpay_order_id" value="{{ $data['order_id'] }}">
</form>