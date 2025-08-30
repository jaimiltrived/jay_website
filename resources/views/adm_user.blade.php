@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">User List </button>
            <a class="btn btn-success fs-6 text-center" href="/adm_add_user">+ Add User</a>
        </div>
        <div class="table-responsive mt-3">
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
                    @foreach($row as $user)
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