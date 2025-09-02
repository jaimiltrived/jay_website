@extends('adm_masterview')
@section('sidebar')

        <div class="table-responsive mt-3">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>User Id</th>
                        <th>Room Id</th>
                        <th>Room Title</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Check-in-date</th>
                        <th>Check-out-date</th>
                        <th>Number of nights</th>
                        <th>Status</th>
                    </tr>
                </thead>
               <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->user_id }}</td>
            <td>{{ $booking->room_id }}</td>
            <td>{{ $booking->room->title ?? 'N/A' }}</td>
            <td>{{ $booking->user->name ?? 'N/A' }}</td>
            <td>{{ $booking->user->email ?? 'N/A' }}</td>
            <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d/m/Y') }}</td>
            <td>
                {{ \Carbon\Carbon::parse($booking->check_in_date)
                    ->diffInDays(\Carbon\Carbon::parse($booking->check_out_date)) }} Nights
            </td>
            <td>{{ $booking->status ?? 'pending' }}</td>
        </tr>
    @endforeach
</tbody>

@endsection