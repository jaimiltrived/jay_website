@extends('master')

@section('nav')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <!-- Heading -->
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Verify OTP</h1>
                                    <p class="mb-4">Please enter the OTP sent to your email to verify your account.</p>
                                </div>

                                <!-- OTP Verification Form -->
                                <form action="{{ route('otp.verify') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="otp">Enter OTP</label>
                                        <input type="text" name="otp" class="form-control form-control-user" placeholder="Enter OTP" value="{{ old('otp') }}">
                                    </div>
                                    @if($errors->has('otp'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('otp') }}
                                        </div>
                                    @endif
                                    <br>
                                    <button type="submit" class="btn btn-block" style="background-color: #962942; color: white;">
                                        Verify OTP
                                    </button>
                                </form>

                                <!-- Resend OTP Button -->
                                @if($errors->has('otp') && $errors->first('otp') === 'Invalid OTP.')
                                    <form action="{{ route('otp.resend') }}" method="POST" class="mt-3">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary btn-block">
                                            Resend OTP
                                        </button>
                                    </form>
                                @endif

                                <!-- Links to Register and Login -->
                                <hr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
