@extends('adm_masterview')
@section('sidebar')

    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success"
                style="background:#d4edda;color:#155724;padding:10px;border-radius:8px;margin-bottom:15px;text-align:center;width:100%;">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger pt-3"
                style="background:#f8d7da;color:#721c24;padding:10px;border-radius:8px;margin-bottom:15px;text-align:center;width:100%">
                {{ session('error') }}
            </div>
        @endif
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Room List </button>
            <a class="btn btn-success fs-6 text-center" href="/adm_add_product">+ Add Room</a>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Room Id</th>
                        <th>TItle</th>
                        <th>Description</th>
                        <th>Occupancy Status</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($row as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->product_name}}</td>
                            <td>{{ $item->discription }}</td>
                            <td>{{ $item->occupancy_status }}</td>
                            <td>{{ $item->type }}</td>
                            <td>₹{{ $item->new_price }}/pernight</td>
                            <td>
                                <div class="d-flex  mt-2">
                                    <form action="{{ route('delete', $item->id) }}"><button class="btn btn-danger me-1">DELETE</button></form>
                                    <a href="{{ route('show_update_room_form', $item->id) }}"><button
                                            class="btn btn-success ms-1">EDIT</i></button></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        setTimeout(function () {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
@endsection