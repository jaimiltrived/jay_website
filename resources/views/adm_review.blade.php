@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Review List</button>

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
                        <th>Review</th>
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
                        <td>I had a wonderful stay at this Hotel! The rooms were clean, spacious, and well-maintained. The management was friendly and always ready to assist. The food quality was great, and the environment was peaceful. Highly recommended for travelers!</td>
                        <td>approved</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>5</td>
                        <td>Cozy Single Room with Balcony</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>I had a wonderful stay at this Hotel! The rooms were clean, spacious, and well-maintained. The management was friendly and always ready to assist. The food quality was great, and the environment was peaceful. Highly recommended for travelers!</td>
                        <td>approved</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>5</td>
                        <td>Cozy Single Room with Balcony</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>I had a wonderful stay at this Hotel! The rooms were clean, spacious, and well-maintained. The management was friendly and always ready to assist. The food quality was great, and the environment was peaceful. Highly recommended for travelers!</td>
                        <td>approved</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>


@endsection