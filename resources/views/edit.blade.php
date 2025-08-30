@extends('master')
@section('nav')
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

    /* @media screen and (max-width:992px) {
            .profile-list {
                display: none;
            }
        } */

    .edit-btn {
        display: inline-block;
        padding: 0.625rem 1.875rem;
        line-height: 1.5625rem;
        background-color: var(--primary-color);
        border: 0.1875rem solid var(--primary-color);
        color: var(--white-color);
        font-size: 0.9375rem;
        font-weight: 600;
        text-transform: capitalize;
        box-shadow: 0px 2px 10px -1px rgb(0 0 0 / 19%);
        -webkit-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
    }

    label {
        color: var(--secondory-color);
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    .form-control {

        margin-top: 2%;
    }
</style>
<div class="container" style="margin-top:10%">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 profile-list">
            <h2>EDIT PROFILE</h2>
            <input type="radio" value="p_info" name="profile" id="overview" class="radio" checked>
            <label for="overview" class="p_label">Edit Profile</label><br>

            <input type="radio" value="order" name="profile" id="orders" class="radio">
            <label for="orders" class="p_label">Change Password</label><br>

            
          
        </div>

        <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8 col-md-mt-3">
            <div class="p_info">
                <h2>Edit Profile</h2>
                <hr>
				<form action="/edit_profile" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group login-page">
											<label for="">First Name <span>*</span></label>
											<input type="text" class="form-control" id="" name="user_fname"
												value="{{ old('user_fname', $row->u_name) }}">
										</div>
										@if($errors->has('user_fname'))
											<span class="text-danger">
												{{ $errors->first('user_fname') }}
											</span>
										@endif
										<div class="form-group login-page">
											<label for="">Last Name <span>*</span></label>
											<input type="text" class="form-control" id="" name="user_lname"
												value="{{ old('user_lname', $row->u_lname) }}">
										</div>
										@if($errors->has('user_lname'))
											<span class="text-danger">
												{{ $errors->first('user_lname') }}
											</span>
										@endif

										<div class="form-group login-page">
											<label for="">Address<span>*</span></label>
											<input type="text" class="form-control" name="user_address"
												value="{{ old('user_address', $row->address) }}">
										</div>
                                        @if($errors->has('user_address'))
											<span class="text-danger">
												{{ $errors->first('user_address') }}
											</span>
										@endif

										<div class="form-group login-page">
											<label for="">Email <span>*</span></label>
											<input type="text" class="form-control" name="user_email"
												value="{{ old('user_email', $row->u_mail) }}">
										</div>
										@if($errors->has('user_email'))
											<span class="text-danger">
												{{ $errors->first('user_email') }}
											</span>
										@endif

                                        <div class="form-group login-page">
											<label for="">Email <span>*</span></label>
											<input type="file" class="form-control" name="profile_picture"
												value="{{ old('profile_picture', $row->profile_picture) }}">
										</div>
										@if($errors->has('profile_picture'))
											<span class="text-danger">
												{{ $errors->first('profile_picture') }}
											</span>
										@endif
										<input type="submit" value="Update" class="btn btn-default login-btn mt-3">
									</form>

            </div>



            <div class="order d-none">
                <h1>YOUR ORDERS</h1>
                <hr>
				<form action="/change_password" method="post">
									@csrf
									<div class="form-group login-page">
										<label for="">Old Password<span>*</span></label>
										<input type="password" class="form-control" id="" name="old_password">
										@if($errors->has('old_password'))
											<span class="text-danger">
												{{ $errors->first('old_password') }}
											</span>
										@endif
									</div>
									<div class="form-group login-page">
										<label for="">New Password<span>*</span></label>
										<input type="password" class="form-control" id="" name="new_password">
									</div>
									@if($errors->has('new_password'))
										<span class="text-danger">
											{{ $errors->first('new_password') }}
										</span>
									@endif

									<div class="form-group login-page">
										<label for="">Confirm Password<span>*</span></label>
										<input type="password" class="form-control" id="" name="conform_password">
									</div>
									@if($errors->has('conform_password'))
										<span class="text-danger">
											{{ $errors->first('conform_password') }}
										</span>
									@endif
									<input type="submit" value="Change Password" class="btn btn-default login-btn">

								</form>
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
            } else if (this.value == 'order') {
                $('div .order').removeClass('d-none');
                $('div .p_info').addClass('d-none');  
            }
        });
    });
</script>
@endsection