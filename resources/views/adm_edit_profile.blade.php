@extends('adm_masterview')
@section('sidebar')

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white fw-bold">
                Admin Profile
            </div>
            <div class="card-body bg-light">

                <!-- Tabs Navigation -->
                <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="edit-tab" data-bs-toggle="tab" data-bs-target="#editProfile"
                            type="button" role="tab">
                            Edit Profile
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#changePassword"
                            type="button" role="tab">
                            Change Password
                        </button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content mt-3" id="profileTabsContent">

                    <!-- Edit Profile Tab -->
                    <div class="tab-pane fade show active" id="editProfile" role="tabpanel">
                        <form action="/edit_profile" method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">First Name</label>
                                    <input type="text" class="form-control" id="" name="user_fname"
                                        value="{{ old('user_fname', $row->u_name) }}">

                                    @if($errors->has('user_fname'))
                                        <span class="text-danger">
                                            {{ $errors->first('user_fname') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Last Name</label>
                                    <input type="text" class="form-control" id="" name="user_lname"
                                        value="{{ old('user_lname', $row->u_lname) }}">

                                    @if($errors->has('user_lname'))
                                        <span class="text-danger">
                                            {{ $errors->first('user_lname') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="text" class="form-control" name="user_email"
                                        value="{{ old('user_email', $row->u_mail) }}" readonly>

                                    @if($errors->has('user_email'))
                                        <span class="text-danger">
                                            {{ $errors->first('user_email') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Address</label>
                                    <input type="text" class="form-control" name="user_address"
                                        value="{{ old('user_address', $row->address) }}">

                                    @if($errors->has('user_address'))
                                        <span class="text-danger">
                                            {{ $errors->first('user_address') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Profile Picture</label>
                                    <input type="file" name="profile_picture" class="form-control">

                                </div>

                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success px-4">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password Tab -->
                    <div class="tab-pane fade" id="changePassword" role="tabpanel">
                        <form action="/change_password" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Current Password</label>
                                    <input type="password" class="form-control" id="" name="old_password">
                                    @if($errors->has('old_password'))
                                        <span class="text-danger">
                                            {{ $errors->first('old_password') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold">New Password</label>
                                    <input type="password" class="form-control" id="" name="new_password">

                                    @if($errors->has('new_password'))
                                        <span class="text-danger">
                                            {{ $errors->first('new_password') }}
                                        </span>
                                    @endif

                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Confirm New Password</label>
                                    <input type="password" class="form-control" id="" name="conform_password">

                                    @if($errors->has('conform_password'))
                                        <span class="text-danger">
                                            {{ $errors->first('conform_password') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success px-4">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (needed for tabs to work) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection