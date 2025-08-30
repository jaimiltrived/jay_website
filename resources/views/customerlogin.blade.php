@extends('master')
@section('nav')

    <style>
        body {
            overflow-x: hidden;
            background-color: #f0ece4;
            color: #a37645;
        }

        .login-container {
            max-width: 1000px;
            margin: 60px auto;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 40px;
            display: flex;
            flex-wrap: wrap;
        }

        .login-column {
            flex: 1 1 50%;
            padding: 20px 30px;
        }

        .login-title h3 {
            font-size: 22px;
            font-weight: 700;
            color: #333;
        }

        .login-title span {
            display: block;
            margin-top: 8px;
            color: #777;
            font-size: 14px;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 6px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .btn.login-btn {
            width: 100%;
            background-color: #b68c5a;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .btn.login-btn:hover {
            background-color: #a37645;
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            font-size: 13px;
            color: #666;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                padding: 20px;
            }
        }

        @media(max-width: 992px) {
            body {
                margin-top: 10%;
                overflow-x: hidden;
            }
        }
    </style>

    <div class="container">
        <h2 style="text-align: center; margin: 40px 0 10px;">Customer Login</h2>

        <div class="login-container">

            <!-- Registered Customers -->
            <div class="login-column">
                @if(session('success'))
                    <div class="alert alert-success"
                        style="background:#d4edda;color:#155724;padding:10px;border-radius:8px;margin-bottom:15px;text-align:center;width:100%;">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger pt-3"
                        style="background:#f8d7da;color:#721c24;padding:10px;border-radius:8px;margin-bottom:15px;text-align:center;width:100%">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="login-title">
                    <h3>Login</h3>
                    <span>If you have an account, sign in with your email address.</span>
                </div>
                <form method="POST" action="{{ route('customer.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email <span>*</span></label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password <span>*</span></label>
                        <input type="password" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn login-btn">Sign In</button>
                    <a href="/forgot" class="back mt-5">Forgot Your Password?</a>
                </form>
            </div>

            <!-- New Customers -->
            <div class="login-column">
                <div class="login-title">
                    <h3>New Customers</h3>
                    <span>Creating an account has many benefits: check out faster, keep more than one address, track orders
                        and more.</span>
                </div>
                <form>
                    <a href="register" class="btn login-btn" style="margin-top: 30px;">Create an Account</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        setTimeout(function () {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
@endsection