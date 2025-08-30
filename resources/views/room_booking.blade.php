@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Room Booking List</button>

        </div>
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
                    <tr>
                        <td>1</td>
                        <td>5</td>
                        <td>Cozy Single Room with Balcony</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>20/7/2025</td>
                        <td>22/7/2025</td>
                        <td>2 Nights</td>
                        <td>approved</td>
                    </tr>
                   <tr>
                        <td>1</td>
                        <td>5</td>
                        <td>Cozy Single Room with Balcony</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>20/7/2025</td>
                        <td>22/7/2025</td>
                        <td>2 Nights</td>
                        <td>approved</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>5</td>
                        <td>Cozy Single Room with Balcony</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>20/7/2025</td>
                        <td>22/7/2025</td>
                        <td>2 Nights</td>
                        <td>approved</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>5</td>
                        <td>Cozy Single Room with Balcony</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>20/7/2025</td>
                        <td>22/7/2025</td>
                        <td>2 Nights</td>
                        <td>approved</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>5</td>
                        <td>Cozy Single Room with Balcony</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>20/7/2025</td>
                        <td>22/7/2025</td>
                        <td>2 Nights</td>
                        <td>approved</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


@endsection