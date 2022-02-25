@extends('master')
@section('content')



<div class="section page-banner">

    <img class="shape-1 animation-round" src="/assets/images/shape/shape-8.png" alt="Shape">

    <img class="shape-2" src="/assets/images/shape/shape-23.png" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Courses Details</li>
            </ul>
            <h2 class="title">Courses <span> Details</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

    <!-- Shape Icon Box Start -->
    <div class="shape-icon-box">

        <img class="icon-shape-1 animation-left" src="/assets/images/shape/shape-5.png" alt="Shape">

        <div class="box-content">
            <div class="box-wrapper">
                <i class="flaticon-badge"></i>
            </div>
        </div>

        <img class="icon-shape-2" src="/assets/images/shape/shape-6.png" alt="Shape">

    </div>
    <!-- Shape Icon Box End -->

    <img class="shape-3" src="/assets/images/shape/shape-24.png" alt="Shape">

    <img class="shape-author" src="/assets/images/author/author-11.jpg" alt="Shape">

</div>
<!-- Page Banner End -->




<!-- Courses Start -->
<div class="section section-padding mt-n10">
    <div class="container">
        <div class="row gx-10">
            <div class="col-lg-8">

                <!-- Courses Details Start -->
                <div class="courses-details">

                    <div class="courses-details-images">
                        <img src="/assets/images/courses/courses-details.jpg" alt="Courses Details">
                        <span class="tags">{{ $courses['language'] }}</span>

                        <div class="courses-play">
                            <img src="/assets/images/courses/circle-shape.png" alt="Play">


                            <a class="play video-popup" href=" https://www.youtube.com/watch?v=Wif4ZkwC0AM"><i class="flaticon-play"></i></a>

                        </div>

                    </div>

                    <h2 class="title">{{ $courses->title}}</h2>

                    <div class="courses-details-admin">
                        <div class="admin-author">
                            <div class="author-thumb">
                                <img src="/assets/images/author/author-01.jpg" alt="Author">
                            </div>
                            <div class="author-content">
                                <a class="name" href="#">{{$courses->instructor}}</a>
                                <span class="Enroll">286 Enrolled Students</span>
                            </div>
                        </div>
                        <div class="admin-rating">
                            <span class="rating-count">4.9</span>
                            <span class="rating-star">
                                <span class="rating-bar" style="width: 80%;"></span>
                            </span>
                            <span class="rating-text">(5,764 Rating)</span>
                        </div>
                    </div>

                    <!-- Courses Details Tab Start -->
                    <div class="courses-details-tab">

                        <!-- Details Tab Menu Start -->
                        <div class="details-tab-menu">
                            <ul class="nav justify-content-center">
                                <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#instructors">Instructors</button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
                            </ul>
                        </div>
                        <!-- Details Tab Menu End -->
                        <div style="margin-top: 10px;">

                            <p style="font-size: 20px;">{{ $courses->description }}</p>

                        </div>
                        <!-- Details Tab Content Start -->
                        <div class="details-tab-content">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="description">

                                    <!-- Tab Description Start -->
                                    <div class="tab-description">
                                        <!--  -->
                            
                                        @if($payments !== 0)
                                        @if(Auth::user() && $modules->isNotEmpty() && $lessons->isNotEmpty() && $payments->isNotEmpty() && $payments !== 0)



                                        @if(Auth::user() && $payments->status == 'success')

                                        <div class="container" style="margin-top: 20px">




                                            @foreach($modules as $module)
                                            <details>

                                                <summary style="font-size: 20px;">Module: {{ $module->title }}</summary>

                                                @foreach($lessons as $lesson)


                                                <details>
                                                    <summary> Lesson: {{ $lesson->title }} </summary>

                                                    <div style="width: 100px; height: 100%;"> {!!html_entity_decode( $lesson->video_link)!!}
                                                    </div>

                                                </details>

                                                @endforeach
                                            </details>


                                            <hr>


                                            @endforeach







                                        </div>



                                        <!-- 
                                        <div class="container" style="margin-top: 20px">
                                            MODULE: 2
                                            @foreach($lessons as $lesson)
                                            <details>
                                                <summary style="font-size: 20px;">Lesson:{{ $lesson['title'] }}</summary>

                                                <p> {{ $lesson['title'] }} </p>
                                                <div>
                                                    {!!html_entity_decode( $lesson['video_link'])!!}
                                                </div>
                                                <hr>



                                            </details>
                                            @endforeach

                                        </div>
 -->
                                        @endif

                                        @endif

                                        @endif



                                        @if(!Auth::user())
                                        <div class="row">
                                            <p>MODULE: Please <a style="color: blue; font-size:20px" class="" href="/login">Login</a> to view the course Contents</hp>
                                        </div>
                                        @endif

                                    </div>
                                    <!-- Tab Description End -->

                                </div>
                                <div class="tab-pane fade" id="instructors">

                                    <!-- Tab Instructors Start -->
                                    <div class="tab-instructors">
                                        <h3 class="tab-title">Course Instructor:</h3>

                                        <div class="row">
                                            <div class="col-md-3 col-6">
                                                <!-- Single Team Start -->
                                                <div class="single-team">
                                                    <div class="team-thumb">
                                                        <img src="/assets/images/author/author-01.jpg" alt="Author">
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rating">
                                                            <span class="count">4.9</span>
                                                            <i class="icofont-star"></i>
                                                            <span class="text">(rating)</span>
                                                        </div>
                                                        <h4 class="name">{{$courses->instructor}}</h4>
                                                        <span class="designation">MSC, Instructor</span>
                                                    </div>
                                                </div>
                                                <!-- Single Team End -->
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <!-- Single Team Start -->
                                                <div class="single-team">
                                                    <div class="team-thumb">
                                                        <img src="/assets/images/author/author-02.jpg" alt="Author">
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rating">
                                                            <span class="count">4.9</span>
                                                            <i class="icofont-star"></i>
                                                            <span class="text">(rating)</span>
                                                        </div>
                                                        <h4 class="name">Mitchell Colon</h4>
                                                        <span class="designation">BBA, Instructor</span>
                                                    </div>
                                                </div>
                                                <!-- Single Team End -->
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <!-- Single Team Start -->
                                                <div class="single-team">
                                                    <div class="team-thumb">
                                                        <img src="/assets/images/author/author-03.jpg" alt="Author">
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rating">
                                                            <span class="count">4.9</span>
                                                            <i class="icofont-star"></i>
                                                            <span class="text">(rating)</span>
                                                        </div>
                                                        <h4 class="name">Sonya Gordon</h4>
                                                        <span class="designation">MBA, Instructor</span>
                                                    </div>
                                                </div>
                                                <!-- Single Team End -->
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <!-- Single Team Start -->
                                                <div class="single-team">
                                                    <div class="team-thumb">
                                                        <img src="/assets/images/author/author-04.jpg" alt="Author">
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rating">
                                                            <span class="count">4.9</span>
                                                            <i class="icofont-star"></i>
                                                            <span class="text">(rating)</span>
                                                        </div>
                                                        <h4 class="name">Archie Neal</h4>
                                                        <span class="designation">BBS, Instructor</span>
                                                    </div>
                                                </div>
                                                <!-- Single Team End -->
                                            </div>
                                        </div>

                                        <div class="row gx-10">
                                            <div class="col-lg-6">
                                                <div class="tab-rating-content">
                                                    <h3 class="tab-title">Rating:</h3>
                                                    <p>Lorem Ipsum is simply dummy text of printing and typesetting industry. Lorem Ipsum has been the i dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                    <p>Lorem Ipsum is simply dummy text of printing and typesetting industry text ever since</p>
                                                    <p>Lorem Ipsum is simply dummy text of printing and dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="tab-rating-box">
                                                    <span class="count">4.8 <i class="icofont-star"></i></span>
                                                    <p>Rating (86K+)</p>

                                                    <div class="rating-box-wrapper">
                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 100%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 75%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 80%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 90%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 60%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 500%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 40%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 80%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 20%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 40%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab Instructors End -->

                                </div>
                                <div class="tab-pane fade" id="reviews">

                                    <!-- Tab Reviews Start -->
                                    <div class="tab-reviews">
                                        <h3 class="tab-title">Student Reviews:</h3>

                                        <div class="reviews-wrapper reviews-active">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">

                                                    <!-- Single Reviews Start -->
                                                    <div class="single-review swiper-slide">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="/assets/images/author/author-06.jpg" alt="Author">
                                                                <i class="icofont-quote-left"></i>
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">Sara Alexander</h4>
                                                                <span class="designation">Product Designer, USA</span>
                                                                <span class="rating-star">
                                                                    <span class="rating-bar" style="width: 100%;"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                    </div>
                                                    <!-- Single Reviews End -->

                                                    <!-- Single Reviews Start -->
                                                    <div class="single-review swiper-slide">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="assets/images/author/author-07.jpg" alt="Author">
                                                                <i class="icofont-quote-left"></i>
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">Karol Bachman</h4>
                                                                <span class="designation">Product Designer, USA</span>
                                                                <span class="rating-star">
                                                                    <span class="rating-bar" style="width: 100%;"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                    </div>
                                                    <!-- Single Reviews End -->

                                                    <!-- Single Reviews Start -->
                                                    <div class="single-review swiper-slide">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="assets/images/author/author-03.jpg" alt="Author">
                                                                <i class="icofont-quote-left"></i>
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">Gertude Culbertson</h4>
                                                                <span class="designation">Product Designer, USA</span>
                                                                <span class="rating-star">
                                                                    <span class="rating-bar" style="width: 100%;"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                    </div>
                                                    <!-- Single Reviews End -->

                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>

                                        <div class="reviews-btn">
                                            <button type="button" class="btn btn-primary btn-hover-dark" data-bs-toggle="modal" data-bs-target="#reviewsModal">Write A Review</button>
                                        </div>

                                        <!-- Reviews Form Modal Start -->
                                        <div class="modal fade" id="reviewsModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add a Review</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <!-- Reviews Form Start -->
                                                    <div class="modal-body reviews-form">
                                                        <form action="#">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <input type="text" placeholder="Enter your name">
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <input type="text" placeholder="Enter your Email">
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <!-- Single Form Start -->
                                                                    <div class="reviews-rating">
                                                                        <label>Rating</label>
                                                                        <ul id="rating" class="rating">
                                                                            <li class="star" title='Poor' data-value='1'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='2'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='3'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='4'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='5'><i class="icofont-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <textarea placeholder="Write your comments here"></textarea>
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <button class="btn btn-primary btn-hover-dark">Submit Review</button>
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- Reviews Form End -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Reviews Form Modal End -->

                                    </div>
                                    <!-- Tab Reviews End -->

                                </div>
                            </div>
                        </div>
                        <!-- Details Tab Content End -->

                    </div>
                    <!-- Courses Details Tab End -->

                </div>
                <!-- Courses Details End -->

            </div>
            <div class="col-lg-4">
                <!-- Courses Details Sidebar Start -->
                <div class="sidebar">

                    <!-- Sidebar Widget Information Start -->
                    <div id="form" class="sidebar-widget widget-information">
                        <div class="info-price">
                            <span class="price">N{{ $courses->price }}</span>
                        </div>
                        <div class="info-list">
                            <ul>
                                <li><i class="icofont-man-in-glasses"></i> <strong>Instructor</strong> <span>{{$courses->instructor}}</span></li>
                                <li><i class="icofont-clock-time"></i> <strong>Duration</strong> <span>{{ $courses->duration }}</span></li>
                                <li><i class="icofont-ui-video-play"></i> <strong>Lectures</strong> <span> </span></li>
                                <li><i class="icofont-bars"></i> <strong>Level</strong> <span>Secondary</span></li>
                                <li><i class="icofont-book-alt"></i> <strong>Language</strong> <span>{{ $courses->language }}</span></li>
                                <li><i class="icofont-certificate-alt-1"></i> <strong>Certificate</strong> <span>Yes</span></li>
                            </ul>
                        </div>



                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <!-- Sidebar Widget Information Start -->


                            @if(Auth::user())
                            <input type="hidden" name="email" value="{{Auth::user()->email }}"> {{-- required --}}
                            @endif
                            <input type="hidden" name="orderID" value="345">
                            <input type="hidden" name="amount" value="{{  $courses->price }}00"> {{-- required in kobo --}}
                            <input type="hidden" name="quantity" value="1">

                            <input type="hidden" name="currency" value="NGN">
                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}


                            <?php
                            $meta = ['course_id' => $courses->id, 'instructor' => $courses->instructor, 'amount' => $courses->price];
                          
                            ?>

                            <input type="hidden" name="metadata" value="{{ json_encode($meta) }}">

                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}


                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                            <!-- check if user is logged in -->
                     


                            @if(Auth::user()  && $payments == null)
                            <div class="info-btn">

                                <button type="submit" class="btn btn-primary btn-block">Buy Now</button>

                              
                                @endif


                                @if($payments)
                                @if(Auth::user() && $payments->status == 'success' && $payments->user_id == Auth::user()->id)
                                <div class="info-btn">
                                    <a href="/dashboard" class="btn btn-primary btn-block">View on Dashboard</a>
                                </div>

                                @endif
                                @endif

                                @if(!Auth::user())
                                <div class="info-btn">
                                    <a href="/stregister/{{ ($courses->id) }}" class="btn btn-primary btn-block">Buy Now</a>
                                </div>
                                @endif
                            </div>







                    </div>


                </div>


                </form>


                <!-- Sidebar Widget Share Start -->


            </div>
        </div>
    </div>

</div>

<!-- Sidebar Widget Information End -->

<!-- Sidebar Widget Share Start -->
<!-- Sidebar Widget Share End -->

</div>
<!-- Courses Details Sidebar End -->
</div>
</div>
</div>
</div>
<!-- Courses End -->
























@endsection