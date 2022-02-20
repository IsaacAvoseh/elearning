@extends('master')
@section('content')





<div class="section page-banner">

    <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">

    <img class="shape-2" src="assets/images/shape/shape-23.png" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Courses</li>
            </ul>
            <h2 class="title">My <span>Courses</span></h2>
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

<!-- Courses Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Courses Category Wrapper Start  -->
        <div class="courses-category-wrapper">
            <div class="courses-search search-2">
             
                    <form method="post">
                        @csrf
                        <input type="text" name="search" placeholder="Search your course">
                        <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                    </form>
               
            </div>

            <ul class="category-menu">
                <li><a class="active" href="/allcourses" >All Courses</a></li>
                <li><a href="#">Collections</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Archived</a></li>
            </ul>
        </div>
        <!-- Courses Category Wrapper End  -->

        <!-- Courses Wrapper Start  -->
        <div class="courses-wrapper-02">
            <div class="row">

                @foreach($courses as $course)

                <div class="col-lg-4 col-md-6">
                    <!-- Single Courses Start -->
                    <div class="single-courses">
                        <div class="courses-images">
                            <a href="details/{{$course->id}}"><img src="assets/images/courses/courses-04.jpg" alt="Courses"></a>

                            <div class="courses-option dropdown">
                                <button class="option-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="icofont-share-alt"></i> Share</a></li>
                                    <li><a href="#"><i class="icofont-plus"></i> Create Collection</a></li>
                                    <li><a href="#"><i class="icofont-star"></i> Favorite</a></li>
                                    <li><a href="#"><i class="icofont-archive"></i> Archive</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="courses-content">
                            <div class="courses-author">
                                <div class="author">
                                    <div class="author-thumb">
                                        <a href="details/{{$course->id}}"><img src="assets/images/author/author-04.jpg" alt="Author"></a>
                                    </div>
                                    <!-- <div class="author-name">
                                        <a class="name" href="#">Jason Williams</a>
                                        <a class="name-2" href="#">Ohula Malsh</a>
                                    </div> -->
                                </div>
                            </div>

                            <h4 class="title"><a href="details/{{$course->id}}">{{ $course->title }}</a></h4>

                            <div class="courses-rating">
                                <p> <b> N{{ $course->price }} </b></p>
                                <!-- 
                                <div class="rating-progress-bar">
                                    <div class="rating-line" style="width: 45%;"></div>
                                </div> -->

                                <div class="rating-meta">
                                    <span class="rating-star">
                                        <span class="rating-bar" style="width: 80%;"></span>
                                    </span>
                                    <p>Language|{{ $course->language }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Courses End -->


                </div>
                @endforeach

            </div>
        </div>
        <!-- Courses Wrapper End  -->

    </div>
</div>
<!-- Courses End -->




@endsection