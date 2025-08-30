@extends('adm_masterview')
@section('sidebar')
    <style>
        .radio {
            visibility: hidden;
        }

        .p_label {
            margin-top: 5%;
            margin-left: -5%;
            color: var(--primary-color);
            font-weight: 600;
        }

        .info {
            letter-spacing: 1px;
            font-size: 20px;
            color: var(--primary-color);
            font-weight: 600;
        }

        .logout {
            font-size: 20px;
            border: none;
            background: transparent;
            margin-top: 3%;
            margin-left: -1%;
            color: var(--primary-color);
            font-weight: 600
        }

        .default {
            aspect-ratio: 3/4;
            object-fit: contain;
            height: 200px;
            margin-top: -5%;
            mix-blend-mode: multiply;
        }


        label {
            color: var(--secondory-color);
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .form-control {
            border: 1px solid var(--primary-color);
            margin-top: 2%;
        }
    </style>
    <div class="container" style="padding-top:10%">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 profile-list">
                <h2>PROFILE</h2>
                <input type="radio" value="p_info" name="profile" id="overview" class="radio" checked>
                <label for="overview" class="p_label">OVERVIEW</label><br>

                <input type="radio" value="order" name="profile" id="orders" class="radio">
                <label for="orders" class="p_label">ORDERS</label><br>


                <input type="radio" value="p-info" name="profile" id="p_info" class="radio">
                <label for="p_info" class="p_label">PERSONAL INFORMATION</label><br>

                <input type="radio" value="address" name="profile" id="address" class="radio">
                <label for="address" class="p_label">ADDRESSES</label><br>
                <a href="/logout"><input type="submit" name="logout" class="logout" value="Logout"></a>



            </div>
            <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8 col-md-mt-3">
                <div class="p_info">
                    <h2>PERSONAL INFORMATION</h2>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="info">{{$row->u_name}}</span>
                        <span class="info">{{$row->u_mail}}</span>


                    </div>

                    <div class="mt-5">
                        <h2>ADDRESSES</h2>
                        <hr>
                        <span class="info">{{$row->address}}</span>
                    </div>


                    <div class="mt-5">
                        <h2> CHANGE PASSWORD</h2>
                        <hr>
                        <a type="submit" class="btn btn-default login-btn" href="{{ route('adm_edit_profile') }}">Change
                            Password</a>
                    </div>

                </div>



                <div class="order d-none">
                    <h1>YOUR ORDERS</h1>
                    <hr>
                </div>

                <div class="p-info d-none">
                    <h1>PERSONAL INFORMATION</h1>
                    <hr>
                    <div class="d-flex justify-content-between">

                        <span class="info">{{$row->u_name}}</span>
                        <span class="info">{{$row->u_mail}}</span>

                        <img style="width:100px; height:100px; border-radius:50%; margin-top:-2%" src="@if(empty($row['profile_picture']))
                            {{ URL::to('/')}}/img/user-profile.jpg
                        @else        
                                {{ asset('storage/profile_pictures/' . $row->profile_picture) }}
                            @endif" class="img-fluid"><br><br>

                    </div>
                    <hr>
                    <a type="submit" class="btn btn-default login-btn" href="{{ route('adm_edit_profile') }}">Edit
                        profile</a>
                </div>

                <div class="address d-none">
                    <h1>ADDRESSES</h1>
                    <hr>
                    <span class="info">{{$row->address}}</span>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('input[type=radio][name=profile]').change(function () {
                if (this.value == 'p_info') {
                    $('div .p_info').removeClass('d-none');
                    $('div .order').addClass('d-none');
                    $('div .return').addClass('d-none');
                    $('div .address').addClass('d-none');
                    $('div .p-info').addClass('d-none');
                } else if (this.value == 'order') {
                    $('div .order').removeClass('d-none');
                    $('div .p_info').addClass('d-none');
                    $('div .return').addClass('d-none');
                    $('div .address').addClass('d-none');
                    $('div .p-info').addClass('d-none');
                } else if (this.value == 'return') {
                    $('div .return').removeClass('d-none');
                    $('div .p_info').addClass('d-none');
                    $('div .order').addClass('d-none');
                    $('div .address').addClass('d-none');
                    $('div .p-info').addClass('d-none');
                } else if (this.value == 'address') {
                    $('div .address').removeClass('d-none');
                    $('div .p_info').addClass('d-none');
                    $('div .order').addClass('d-none');
                    $('div .return').addClass('d-none');
                    $('div .p-info').addClass('d-none');
                } else if (this.value == 'p-info') {
                    $('div .p-info').removeClass('d-none');
                    $('div .p_info').addClass('d-none');
                    $('div .order').addClass('d-none');
                    $('div .return').addClass('d-none');
                    $('div .address').addClass('d-none');
                }
            });
        });
    </script>
@endsection