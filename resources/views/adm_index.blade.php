@extends('adm_masterview')
@section('sidebar')
    <style>
        .cards-details {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .cards-details .card {
            flex: 1 1 calc(25% - 20px);
            /* 4 cards per row */
            box-sizing: border-box;
        }

        .bg-blue {
            background-color: #007bff;
        }

        .bg-green {
            background-color: #28a745;
        }

        .bg-orange {
            background-color: #fd7e14;
        }

        .bg-purple {
            background-color: #6f42c1;
        }


        @media (max-width: 1024px) {
            .cards-details .card {
                flex: 1 1 calc(50% - 20px);
                /* 2 cards per row */
            }
        }

        @media (max-width: 767px) {
            .cards-details .card {
                flex: 1 1 100%;
                /* 1 card per row */
            }
        }
    </style>

    <div class="container-fluid">
        <div class="cards-details pt-5">
            <div class="card bg-blue">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Users</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">10</h6>
                    </div>
                </div>
            </div>
            <div class="card bg-green">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">₹50,000</h6>
                </div>
            </div>
            <div class="card bg-orange">
                <div class="card-body">
                    <h5 class="card-title">Active Orders</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">34</h6>
                </div>
            </div>
            <div class="card bg-purple">
                <div class="card-body">
                    <h5 class="card-title">Pending Tasks</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">5</h6>
                </div>
            </div>
        </div>

        <div class="table-responsive mt-5">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Sr No.</th>
                        <th>Pofile picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <img  style="width:100px; height:100px; margin-top:-2%;" src=" {{ asset('storage/profile_pictures/' . $user->profile_picture) }}" />
                            </td>
                            <td>{{ "{$user->u_name} {$user->l_name}" }}</td>
                            <td>{{ $user->u_mail }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->status }}</td>

                            <td>
                                <form action="{{ route('delete_user', $user->id) }}">
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection