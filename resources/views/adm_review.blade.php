@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Review List</button>

        </div>
        <div class="table-responsive mt-3">
            <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>User</th>
            <th>Review</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->product->name ?? 'N/A' }}</td>
                <td>{{ $review->email }}</td>
                <td>{{ $review->review }}</td>
                <td>{{ $review->rating }}</td>
                <td>
                    @if($review->approved)
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Disapproved</span>
                    @endif
                </td>
                <td>
                    @if(!$review->approved)
                        <a href="{{ route('reviews.approve', $review->id) }}" class="btn btn-success btn-sm">Approve</a>
                    @else
                        <a href="{{ route('reviews.disapprove', $review->id) }}" class="btn btn-danger btn-sm">Disapprove</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>


@endsection