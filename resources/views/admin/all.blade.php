<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themefie.com/html/edufie/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Nov 2021 15:48:59 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edufie - Online Courses Html Template</title>
    <!--fivicon icon-->
    <link rel="icon" href="asset/img/fevicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="asset/css/animate.min.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/magnific.min.css">
    <link rel="stylesheet" href="asset/css/nice-select.min.css">
    <link rel="stylesheet" href="asset/css/owl.min.css">
    <link rel="stylesheet" href="asset/css/slick-slide.min.css">
    <link rel="stylesheet" href="asset/css/fontawesome.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/responsive.css">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">


</head>

<body class='sc5'>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div id="wave1">
            </div>
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- search popup area start -->
    <div class="search-popup" id="search-popup">
        <form action="https://themefie.com/html/edufie/home.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- //. search Popup -->

    <section class="admin-dashboard-section">
        <div class="admin-dashboard-right-side">
            <!-- top header start  -->
            <div class="main-header">
                <div class="header-wraper">
                    <div class="row">
                        <div class="col-xl-6">
                            <span class="header-user">
                                <a href="#"><img style="width: 70px; height: 70px; border-radius:50%" src="{{ Auth::user()->photo }}" alt="img"></a>
                                <span>Hello,
                                    <h5>{{ Auth::user()['name']}}</h5>
                                </span>
                            </span>
                        </div>
                        <div class="col-xl-6 align-self-center text-lg-end">
                            <div class="d-lg-flex align-items-center">
                                <div class="user-rating text-center d-inline-block">
                                    <span class="d-block">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </span>
                                    4.0 (172 Ratings)
                                </div>


                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('student') )
                                <a class="header-btn btn btn-white" href="#">Log Out</a>
                                @endif

                                @if(Auth::user()->hasRole('instructor') )
                                <a class="header-btn btn btn-white" href="/form">Create New</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top header end  -->



            <div class="dashboard-course">
                <h5 class="dashboard-title">All Courses</h5>
                @include('flash')

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Course Title</th>
                                <th scope="col">Instructor Name</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        @foreach($allcourseslist as $course)
                        <tbody>

                            <tr>
                                <td scope="row">{{$course->title}}
                                </td>
                                <td>{{$course->users->name}}</td>

                                <td><a style="background-color: blue;" class="btn btn-primary" href="/details/{{ $course->id }}">View</a> || <a style="background-color: crimson;" class="btn btn-primary" href="/delete/{{$course->id}}">Delete</a> </td>

                            </tr>



                            <!-- <td>
                                        <span class="user-rating">
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                4.9
                                            </span>
                                        </span>
                                    </td> -->



                        </tbody>
                        @endforeach

                    </table>


                </div>

            </div>

            {{ $allcourseslist->links('vendor.pagination.bootstrap-4')  }}





        </div>



        <!-- dashboard-area start  -->

        </div>
        <!-- dashboard-left-menu start  -->
        <div class="dashboard-left-menu">
            <a href="#" class="logo"><img src="asset/img/logo.png" alt="img"></a>
            <ul>
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/dashboard"><i class="fas fa-tachometer-alt"></i>Dashboard: {{ Auth::user()->role }} </a>
                </li>

                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/"><i class="fas fa-home"></i> Home </a>
                </li>

                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/allcourses"><i class="fas fa-book"></i>All Courses</a>
                </li>

                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/profile"><i class="fa fa-user"></i> My Profile</a>
                </li>
                @if(Auth::user()->hasRole('instructor'))
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/courses"><i class="fas fa-graduation-cap"></i>Courses</a>
                </li>
                @endif

                @if(Auth::user()->hasRole('student'))
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/courses"><i class="fas fa-graduation-cap"></i>Enrolled Courses</a>
                </li>
                @endif
                <!-- <li class="nav-item">
                    <a class="dashboard-item-menu" href="#"><i class="fab fa-buffer"></i>My Quiz Attempts</a>
                </li> -->

                @if(Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/instructors"><i class="fa fa-rocket"></i>List Of Instructor</a>
                </li>
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/all"><i class="fa fa-shopping-cart"></i>All Courses</a>
                </li>
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/categories"><i class="fa fa-shopping-cart"></i>Category</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="#"><i class="fas fa-cog"></i>Settings</a>
                </li>
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i>Back</a>
                </li>
                <li class="nav-item">
                    <a class="dashboard-item-menu" href="/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>



    <!-- all plugins here -->
    <script src="asset/js/jquery.3.6.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/imageloded.min.js"></script>
    <script src="asset/js/counterup.js"></script>
    <script src="asset/js/waypoint.js"></script>
    <script src="asset/js/magnific.min.js"></script>
    <script src="asset/js/isotope.pkgd.min.js"></script>
    <script src="asset/js/nice-select.min.js"></script>
    <script src="asset/js/fontawesome.min.js"></script>
    <script src="asset/js/ripple.js"></script>
    <script src="asset/js/owl.min.js"></script>
    <script src="asset/js/slick-slider.min.js"></script>
    <script src="asset/js/wow.min.js"></script>
    <!-- main js  -->
    <script src="asset/js/main.js"></script>
</body>

<!-- Mirrored from themefie.com/html/edufie/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Nov 2021 15:49:14 GMT -->

</html>