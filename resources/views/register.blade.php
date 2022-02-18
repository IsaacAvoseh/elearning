@extends('master')
@section('content')



<!-- Overlay Start -->
<div class="overlay"></div>
<!-- Overlay End -->

<!-- Page Banner Start -->
<div class="section page-banner">

    <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">

    <img class="shape-2" src="assets/images/shape/shape-23.png" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Register</li>
            </ul>
            <h2 class="title">Registration <span>Form</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

    <!-- Shape Icon Box Start -->
    <div class="shape-icon-box">

        <img class="icon-shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

        <div class="box-content">
            <div class="box-wrapper">
                <i class="flaticon-badge"></i>
            </div>
        </div>

        <img class="icon-shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

    </div>
    <!-- Shape Icon Box End -->

    <img class="shape-3" src="assets/images/shape/shape-24.png" alt="Shape">

    <img class="shape-author" src="assets/images/author/author-11.jpg" alt="Shape">

</div>
<!-- Page Banner End -->

<!-- Register & Login Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Register & Login Wrapper Start -->
        <div class="register-login-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6">

                    <!-- Register & Login Images Start -->
                    <div class="register-login-images">
                        <div class="shape-1">
                            <img src="assets/images/shape/shape-26.png" alt="Shape">
                        </div>


                        <div class="images">
                            <img src="assets/images/register-login.png" alt="Register Login">
                        </div>
                    </div>
                    <!-- Register & Login Images End -->

                </div>
                <div class="col-lg-6">

                    <!-- Register & Login Form Start -->


                    <div class="register-login-form">
                        @if(url()->current() == url('/stregister'))
                        <a class="btn btn-primary btn-hover-dark w-100" href="/inregister">Register as an Instructor</a>
                        @endif
                        <h3 class="title">Registration <span>Now</span></h3>

                        <div class="form-wrapper">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('flash')
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label for="firstname">First Name</label>
                                    <input value="{{ old('firstname') }}" type="text" name="firstname" placeholder="Enter Your First Name">
                                    <span class="text-danger">@error ('firstname') {{$message}} @enderror</span>

                                </div>
                                <div class="single-form">
                                    <label for="lastname">Last Name </label>
                                    <input value="{{ old('lastname') }}" type="text" name="lastname" placeholder="Enter Your Last Name">
                                    <span class="text-danger">@error ('lastname') {{$message}} @enderror</span>
                                </div>
                                <div class="single-form">
                                    <label for="name">User Name</label>
                                    <input value="{{ old('name') }}" type="text" name="name" placeholder="Choose a username">
                                    <span class="text-danger">@error ('name') {{$message}} @enderror</span>
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label for="email">Email</label>
                                    <input value="{{ old('email') }}" type="email" name="email" placeholder="Email">
                                    <span class="text-danger">@error ('email') {{$message}} @enderror</span>
                                </div>

                                <div class="single-form">
                                    <label for="phone">Phone Number</label>
                                    <input value="{{ old('phone') }}" type="text" name="phone" placeholder="Phone Number">
                                    <span class="text-danger">@error ('phone') {{$message}} @enderror</span>
                                </div>
                                @if(url()->current() == url('/inregister'))
                                <div class="single-form">
                                    <label for="skills">Skills or Occupation</label>
                                    <input value="{{ old('skills') }}" type="text" name="skills" placeholder="Skills or Occupation">
                                    <span class="text-danger">@error ('skills') {{$message}} @enderror</span>
                                </div>

                                <div class="single-form">
                                    <label for="skills">Bio </label>
                                    <textarea name="bio" id="" cols="30" rows="10" placeholder="Tell us about yourself">{{ old('bio') }}</textarea>
                                    <span class="text-danger">@error ('bio') {{$message}} @enderror</span>
                                </div>
                                @endif
                                <div class="">
                                    <label for="skills">Profile Image</label>
                                    <input type="file" name="photo" id="">
                                </div>


                                @if(isset($id))
                                <input type="hidden" name="course_id" value="{{$id}}">
                                @endif
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label for="password">Password</label>
                                    <input value="{{ old('password') }}" type="password" name="password" placeholder="Password">
                                    <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                    <span class="text-danger">@error ('password_confirmation') {{$message}} @enderror</span>
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <button type="submit" class="btn btn-primary btn-hover-dark w-100">Create an account</button>
                                    <a class="btn btn-secondary btn-outline w-100" href="/login">Sign in</a>
                                </div>
                                <!-- Single Form End -->
                            </form>
                        </div>
                    </div>
                    <!-- Register & Login Form End -->

                </div>
            </div>
        </div>
        <!-- Register & Login Wrapper End -->

    </div>
</div>
<!-- Register & Login End -->

<!-- Download App Start -->

<!-- Download App End -->


@endsection