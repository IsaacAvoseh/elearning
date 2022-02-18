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
             <!-- top header end  -->

             <!-- dashboard-area start  -->
             <!-- dashboard-area start  -->





             <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                         <div class="modal-header border-bottom-0">
                             <h5 class="modal-title" id="exampleModalLabel">Update your Profile</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="modal-body">
                                 <div class="form-group">
                                     <label for="email1">Email address</label>
                                     <input value="{{ Auth::user()->email }}" type="email" name="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
                                     <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small>
                                 </div>
                                 <div class="form-group">
                                     <label for="text">First Name</label>
                                     <input type="text" name="firstname" class="form-control" id="password1" placeholder="First Name" value="{{ Auth::user()->firstname }}">
                                 </div>
                                 <div class="form-group">
                                     <label for="text">Last Name</label>
                                     <input value="{{ Auth::user()->lastname }}" type="text" name="lastname" class="form-control" id="password1" placeholder="Last Name">
                                 </div>
                                 <div class="form-group">
                                     <label for="text">Status</label>
                                     <input type="text" name="status" readonly class="form-control" id="password1" placeholder="" value="{{ Auth::user()->status }}">
                                 </div>
                                 <div class="form-group">
                                     <label for="text">User</label>
                                     <input type="text" name="type" readonly class="form-control" id="password1" placeholder="" value="{{ Auth::user()->type }}">
                                 </div>
                                 <div class="form-group">
                                     <label for="text">Phone Number</label>
                                     <input value="{{ Auth::user()->phone }}" type="text" name="phone" class="form-control" id="password1" placeholder="Enter your phone number">
                                 </div>
                                 <div class="form-group">
                                     <label for="text">Skills/Occupation</label>
                                     <input value="{{ Auth::user()->skills }}" type="text" name="skills" class="form-control" id="password1" placeholder="List your skills">
                                 </div>
                                 <div class="form-group">
                                     <label for="text">Bio</label>
                                     <textarea placeholder="Say Something about yourself" name="bio" id="" cols="30" rows="5"> {{ Auth::user()->bio }} </textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="text">Username</label>
                                     <input value="{{ Auth::user()->name }}" type="text" name="name" class="form-control" id="password1" placeholder="choose a username">
                                 </div>

                                 <div class="form-group">
                                     <label for="text">Profile Image</label>
                                     <input type="file" name="photo" class="form-control" id="password1" placeholder="Upload an image">
                                 </div>

                             </div>
                             <div class="modal-footer border-top-0 d-flex justify-content-center">
                                 <button type="submit" class="btn btn-success">Submit</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             @include('flash')
             <div class="dashboard-profile-area">
                 <h5 class="dashboard-title">My Profile</h5>

                 <button style="height: 40px;" type="button" data-toggle="modal" data-target="#form">
                     <i class="fa fa-user"></i> Edit
                 </button>




                 <ul>
                     <li><span>Registration Date</span>{{ Auth::user()->created_at }}</li>
                     <li><span>First Name</span>{{ Auth::user()->firstname }}</li>
                     <li><span>Last Name</span>{{ Auth::user()->lastname }}</li>
                     <li><span>Username</span>{{ Auth::user()->name }}</li>
                     <li><span>Email</span>{{ Auth::user()->email }}</li>
                     <li><span>Phone Number</span>{{ Auth::user()->phone}}</li>
                     <li><span>Skil/Occupation</span>{{ Auth::user()->skills }}</li>
                     <li><span>Bio</span>{{ Auth::user()->bio }}</li>
                 </ul>
             </div>
         </div>











         <!-- dashboard-area end  -->
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

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>

 <!-- Mirrored from themefie.com/html/edufie/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Nov 2021 15:49:14 GMT -->

 </html>