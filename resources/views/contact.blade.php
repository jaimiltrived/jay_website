@extends('master')
@section('nav')
    <style>
        body {
            background-color: #f0ece4;
            overflow-x: hidden;

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
        <h3>Contact Us</h3>
    </div>

    <div class="register-container">
        <div class="row form-wrapper">
            <!-- Left: User Form -->
            <div class="col-md-6 form-card">
                <h3 class="form-title">Contact Us</h3>
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your first name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>



                    <div class="form-group">
                        <label>message *</label>
                        <textarea class="form-control" id="message" name="message" rows="3">{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection