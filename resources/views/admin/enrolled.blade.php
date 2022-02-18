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
                                    <h5>{{ Auth::user()->name}}</h5>
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


                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('user') )
                                <a class="header-btn btn btn-white" href="/logout">Log Out</a>
                                @endif

                                @if(Auth::user()->hasRole('instructor') )
                                <a class="header-btn btn btn-white" href="/form">Create New</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- dashboard-area end  -->
            <div class="dashboard-course">
                <h5 class="dashboard-title">My Courses</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Course Name</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrolled as $course)
                            <tr>
                                <th scope="row">{{$course->name}}
                                </th>
                                <td><a class="btn btn-btn-primary" href="#">View</a></td>
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
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>







            <!-- top header end  -->
            <!-- dashboard-area start  -->
            <!-- <div class="dashboard-course-area">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="dashboard-title">My Enrolled Courses</h5>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> All Courses </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"> Active Courses </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Completed Courses </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/lesson/2.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-1" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/lesson/3.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-2" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/4.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-3" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/5.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-4" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/6.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-5" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/7.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-6" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/6.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-7" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/7.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-8" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/6.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-9" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-course-wrap media">
                                    <div class="thumb" style="background-image: url(asset/img/course/7.png);">
                                    </div>
                                    <div class="wrap-details">
                                        <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                        <div class="user-area">
                                            <div class="user-details">
                                                <img src="asset/img/author/1.png" alt="img">
                                                <a href="#">Jessica Jessy</a>
                                            </div>
                                            <div class="user-rating">
                                                <span><i class="fa fa-star"></i>
                                                    4.9</span>(76)
                                            </div>
                                        </div>
                                        <div class="progress-item">
                                            <div class="row align-items-center">
                                                <div class="col-5">
                                                    <span>Total Lessons: <span>8</span></span>
                                                </div>
                                                <div class="col-7 text-end">
                                                    <span>Completed Lessons: <span>1 / 8</span></span>
                                                </div>
                                            </div>
                                            <div class="progress-bg">
                                                <div id="progress-10" class="progress-rate" data-value="13">
                                                    <div class="progress-count-wrap">
                                                        <span class="progress-count counting" data-count="13">0</span>
                                                        <span class="counting-icons">% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
            <!-- dashboard-left-menu start  -->
            <div class="dashboard-left-menu">
                <a href="#" class="logo"><img src="asset/img/logo.png" alt="img"></a>
                <ul>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="dashboard.html"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="dashboard-profile.html"><i class="fa fa-user"></i> My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="dashboard-course.html"><i class="fas fa-graduation-cap"></i>Enrolled Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="dashboard-wishlist.html"><i class="fas fa-bookmark"></i>Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="dashboard-review.html"><i class="fas fa-star"></i>Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fab fa-buffer"></i>My Quiz Attempts</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fa fa-shopping-cart"></i>Purchase History</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fa fa-rocket"></i>My Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fas fa-money-check"></i>Earnings</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fas fa-wallet"></i>Withdrawal</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fas fa-question-circle"></i>Quiz Attempts</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fas fa-user-graduate"></i>Question & Answer</a>
                    </li>
                    <li class="nav-item">
                        <a class="dashboard-item-menu" href="#"><i class="fas fa-book"></i>Assignments</a>
                    </li>
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

<!-- Mirrored from themefie.com/html/edufie/dashboard-course.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Nov 2021 15:49:33 GMT -->

</html> <!-- dashboard-area start  -->
@include('flash')
@if(Auth::user()->hasRole('admin'))

<div class="dashboard-area">
    <h5 class="dashboard-title">Dashboard: Admin</h5>
    <div class="row">
        <div class="col-lg-4">
            <div class="single-dashboard-inner">
                <img src="asset/img/icon/open-book.png" alt="img">
                <div class="media-body">
                    <h4>{{ $allinstructors }}</h4>
                    <p>Total Instructors</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-dashboard-inner">
                <img src="asset/img/icon/open-book.png" alt="img">
                <div class="media-body">
                    <h4>6</h4>
                    <p>Active Courses</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-dashboard-inner">
                <img src="asset/img/icon/open-book.png" alt="img">
                <div class="media-body">
                    <h4>1</h4>
                    <p>Completed Courses</p>
                </div>
            </div>
        </div>



        <div class="col-lg-4">
            <div class="single-dashboard-inner">
                <img src="asset/img/icon/open-book.png" alt="img">
                <div class="media-body">
                    <h4>{{ $allstudents }}</h4>
                    <p>Total Student</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-dashboard-inner">
                <img src="asset/img/icon/open-book.png" alt="img">
                <div class="media-body">
                    <h4>{{ $allcourses }}</h4>
                    <p>Total Courses</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-dashboard-inner">
                <img src="asset/img/icon/open-book.png" alt="img">
                <div class="media-body">
                    <h4>{{ $totalAmount }}</h4>
                    <p>Total Earnings</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endif
<!-- dashboard-area end  -->
<!-- <div class="dashboard-course">
                    <h5 class="dashboard-title">My Courses</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                              
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td><a class="btn btn-btn-primary" href="#">View</a></td>
                                    <td>
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
                                    </td>
                                </tr>
                       

                            </tbody>

                        </table>
                    </div>
                </div> -->








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
        <!-- <li class="nav-item">
            <a class="dashboard-item-menu" href="#"><i class="fa fa-shopping-cart"></i>Purchase History</a>
        </li> -->
        @if(Auth::user()->hasRole('admin'))
        <li class="nav-item">
            <a class="dashboard-item-menu" href="/instructors"><i class="fa fa-rocket"></i>List Of Instructor</a>
        </li>
        @endif
        <li class="nav-item">
            <a class="dashboard-item-menu" href="#"><i class="fas fa-cog"></i>Settings</a>
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