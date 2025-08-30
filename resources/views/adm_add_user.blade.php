@extends('adm_masterview')
@section('sidebar')


  <style>
    body {
    background-color: #e8ecfa;
    /* matches your panel */
    }

    .card {
    border: none;
    }

    .form-label {
    color: #000;
    }

    .btn-success {
    background-color: #28a745;
    border: none;
    }

    .btn-success:hover {
    background-color: #218838;
    }
  </style>
  <div class="container" style="padding-top: 7%;">
    <div class="card shadow" style="border-radius: 12px;">
    <div class="card-header bg-dark text-white">
      <h4 class="mb-0">Add New User</h4>
    </div>
    <div class="card-body bg-light">
      <form action="{{ route('adm_add_user') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">

        <!-- First Name -->
        <div class="col-md-6">
        <label for="firstName" class="form-label fw-bold">First Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your first name">
        @if ($errors->has('name'))
      <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif
        </div>

        <!-- Last Name -->
        <div class="col-md-6">
        <label for="lastName" class="form-label fw-bold">Last Name</label>
        <input type="text" name="lname" class="form-control" placeholder="Enter your last name">
        @if ($errors->has('lname'))
      <span class="text-danger">{{ $errors->first('lname') }}</span>
      @endif
        </div>

        <!-- Email -->
        <div class="col-md-6">
        <label for="userEmail" class="form-label fw-bold">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email">
        @if ($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
        </div>

        <div class="col-md-6">
        <label for="address" class="form-label fw-bold">Address</label>
        <input type="text" name="address" class="form-control" placeholder="Enter your address">
        @if ($errors->has('address'))
      <span class="text-danger">{{ $errors->first('address') }}</span>
      @endif
        </div>

        <div class="col-md-6">
        <label class="form-label fw-bold">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password">
        @if ($errors->has('password'))
      <span class="text-danger">{{ $errors->first('password') }}</span>
      @endif
        </div>

        <div class="col-md-6">
        <label class="form-label fw-bold">Password</label>
        <input type="password" name="con_password" class="form-control" placeholder="Confirm password">
        @if ($errors->has('con_password'))
      <span class="text-danger">{{ $errors->first('con_password') }}</span>
      @endif
        </div>

        <!-- User Role -->
        <div class="col-md-12">
        <label for="userRole" class="form-label fw-bold">User Role</label>
        <select class="form-select" id="userRole" name="role" required>
          <option selected disabled>Choose role</option>
          <option value="admin">Admin</option>
          <option value="customer">Customer</option>
        </select>
        @if ($errors->has('role'))
      <span class="text-danger">{{ $errors->first('role') }}</span>
      @endif
        </div>

        <!-- Status -->
        <div class="col-md-12">
        <label for="status" class="form-label fw-bold">Status</label>
        <select class="form-select" id="status" name="status" required>
          <option selected disabled>Choose status</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
        @if ($errors->has('status'))
      <span class="text-danger">{{ $errors->first('status') }}</span>
      @endif
        </div>

        <!-- Profile Picture -->
        <div class="col-md-12">
        <label for="profilePic" class="form-label fw-bold">Profile Picture</label>
        <input type="file" name="profile_picture" class="form-control">
        @if ($errors->has('profile_picture'))
      <span class="text-danger">{{ $errors->first('profile_picture') }}</span>
      @endif
        </div>

        <!-- Submit Button -->
        <div class="col-12 text-end mt-3">
        <button type="submit" class="btn btn-success px-4">Add User</button>
        </div>

      </div>
      </form>
    </div>
    </div>
  </div>

@endsection