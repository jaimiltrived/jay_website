@extends('master')

@section('nav')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                        <p class="mb-4">Enter your new password below to reset your account password.</p>
                                    </div>

                                    <!-- Reset Password Form -->
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        <!-- New Password -->
                                        <div class="form-group">
                                            <input type="password" name="new_password" class="form-control form-control-user" placeholder="Enter New Password" value="{{ old('new_password') }}">
                                        </div>
                                        @if($errors->has('new_password'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('new_password') }}
                                            </div>
                                        @endif
                                        <br>

                                        <!-- Confirm New Password -->
                                        <div class="form-group">
                                            <input type="password" name="new_password_confirmation" class="form-control form-control-user" placeholder="Confirm New Password" value="{{ old('new_password_confirmation') }}">
                                        </div>
                                        @if($errors->has('new_password_confirmation'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('new_password_confirmation') }}
                                            </div>
                                        @endif
                                        <br>

                                        <!-- Reset Password Button -->
                                        <button type="submit" class="btn btn-block" style="background-color: #962942; color: white;">
                                            Reset Password
                                        </button>
                                    </form>

                                    <hr>

                                    <!-- Links for Navigation -->
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                    </div>

                                    <!-- Back Button -->
                                    <div class="mt-3">
                                        <button onclick="window.history.back()" class="btn btn-light btn-block">
                                            Back
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Form Column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
@endsection
