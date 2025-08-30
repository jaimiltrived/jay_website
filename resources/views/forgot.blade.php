@extends('master')
@section('nav')
    <style>
        body {
            background-color: #f0ece4;
            color: #a37645 !important;
        }

        .register-container {
            padding: 60px 0;
        }

        .form-wrapper {
            background: white;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            margin: auto;
            max-width: 950px;
            display: flex;
            flex-wrap: wrap;
        }

        .form-card,
        .social-card {
            padding: 40px 30px;
            flex: 1 1 450px;
        }

        .form-title {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .btn-primary {
            background-color: #b68c5a;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
            color: white;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #a37645;
        }

        .social-btn {
            display: block;
            text-align: center;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            font-weight: 600;
            color: white;
            font-size: 14px;
            text-decoration: none;
        }

        .facebook-btn {
            background-color: #3b5998;
        }

        .google-btn {
            background-color: #db4437;
        }

        .social-btn i {
            margin-right: 8px;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            font-size: 13px;
            color: #555;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media(max-width: 992px) {
            body {
                margin-top: 10%;
                overflow-x: hidden;
            }
        }
    </style>

    <div class="text-center mt-5">
        <h3>Forgot Password</h3>
    </div>

    <div class="register-container">
        <div class="row form-wrapper">
            <!-- Left: User Form -->
            <div class="col-md-6 form-card">
                <h3 class="form-title">Forgot Password</h3>
                <form action="{{ route('forgot') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    <div class="text-center mt-4">
                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection