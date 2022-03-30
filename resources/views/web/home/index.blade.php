@extends('web.layout')
@section('title')
  Home
@endsection



@section('main')
<!-- Home -->
<div id="home" class="hero-area">

    <!-- Backgound Image -->
    <div class="bg-image  home-bg" style="background-image:url({{asset('web/img/ver2.jpg')}})"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div   class="content">
                        <h1 class="home-head">Hamza Education</h1>
                        <div class="h3">
                            <h3 class="home-desc">منصة علمية تهدف لتسهيل التعلم عن بعد<span>&#1548;</span> انضم الآن إلى أفضل صرح تعليمي</h3>
                        </div>
                        <div class="home-btns">
                            <a class="head-buttons" href="{{url("/register")}}" ><button  class="head-btn-log">اشترك الآن</button></a>
                            <a class="head-buttons" onclick="scrollBtn()"   ><button class="head-btn">أخر التحديثات</button></a>
                        </div>
                        
                        <div class="icons"> 
                            <a href="https://www.facebook.com/hamza.education1/" target="_blank"><i class="fab f-ic fa-facebook-f "></i></a> 
                            <a href="https://www.youtube.com/channel/UCqGsISX5O2tvS7aHaCGQ8pA" target="_blank"><i class="fab fa-youtube"></i></a> 
                            <a href="mailto:info@hamza-education.com" target="_blank"><i class="far fa-envelope"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- /Home -->

<section class="slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner text-center">
                        <!-- Quote 1 -->
                        
                        <div class="item active">
                            <blockquote>
                            </blockquote>

                                <div class="row">
                                    <div class="col-md-6 col-sm-offset-1" data-aos="zoom-in-up">
                                        <div class="video-box">
                                            <div class="video-layer"></div>
                                            <img class="img-fluid w-100" src="{{asset("uploads/$ads1->img")}}" alt="">
                                        </div>
                                    </div>
                                        <div class="col-md-5" data-aos="fade-down-left">
                                            <div class="video-details">
                                                <i class="fas fa-quote-right"></i>
                                                <h2 class="head">{{$ads1->title}}</h2>
                                                <p>{{$ads1->desc}}</p>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <!-- Quote 2 -->
                        <div class="item">
                            <blockquote>
                            </blockquote>

                                <div class="row">
                                    <div class="col-md-6 col-sm-offset-1" data-aos="zoom-in-up">
                                        <div class="video-box">
                                            <div class="video-layer"></div>
                                            <img class="img-fluid w-100" src="{{asset("uploads/$ads2->img")}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-5" data-aos="fade-down-left">
                                            <div class="video-details">
                                                <i class="fas fa-quote-right"></i>
                                                <h2 class="head">{{$ads2->title}}</h2>
                                                <p>{{$ads2->desc}}</p>
                                                
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <!-- Quote 3 -->
                        <div class="item">
                            <blockquote>
                            </blockquote>
                                <div class="row">
                                    <div class="col-md-6 col-sm-offset-1" data-aos="zoom-in-up">
                                        <div class="video-box">
                                            <div class="video-layer"></div>
                                            <img class="img-fluid w-100" src="{{asset("uploads/$ads3->img")}}" alt="">
                                        </div>
                                    </div>
                                        <div class="col-md-5" data-aos="fade-down-left">
                                            <div class="video-details">
                                                <i class="fas fa-quote-right"></i>
                                                <h2 class="head">{{$ads3->title}}</h2>
                                                <p>{{$ads3->desc}}</p>
                                                
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive " src="https://s3.amazonaws.com/uifaces/faces/twitter/mantia/128.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/adhamdannaway/128.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="">
                        </li>
                    </ol>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Courses -->

<div class="container">
    <div class="brdr">
    </div>
</div>


<!-- /Courses -->

<section class="subjects">
    <div class="subject-bg" style="background-image:url({{asset('web/img/back1.jpg')}})"></div>

    {{-- <div data-aos="zoom-in-right" data-aos-duration="1000"> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><span>المواد</span></h1>
                </div>
            </div>
        </div>
    <div class="container conta">
        <div class="row">
            {{-- <h2>المواد المتاحة حاليا</h2> --}}
            <div class="subject-head" data-aos="fade-down">
                <div class="col-md-6">
                    <div class="head-content">
                        <h2>  الجيولوجيا الصف الثالث الثانوي</h2>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> مجتمع تعليمي متكامل </li>
                            <li><i class="fas fa-check-circle"></i> محتوى عالي الجودة </li>
                            <li><i class="fas fa-check-circle"></i> متابعة يومية للطالب</li>
                        </ul>

                        <hr>
                        <a class="main-button icon-button" href="{{url("/skills/show/4")}}">مشاهدة الان</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="subject-img">
                        <img class="img-fluid w-100" src="{{asset("web/img/earth.jpg")}}" alt="">
                    </div> 
                </div>
            </div>

        </div>
        </div>
    {{-- </div> --}}

    <div class="container">

            <div class="row">
                <div data-aos="fade-up" data-aos-duration="1000">

                <div class="col-md-4 left cartona">
                    <div>
                        <img class="img-fluid" src="{{asset("web/img/bio1.jpg")}}" alt="">
                    </div>
                    <div class="cartona_desc">
                        <h2> الاحياء الصف الاول الثانوي</h2>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> مجتمع تعليمي متكامل </li>
                            <li><i class="fas fa-check-circle"></i> محتوى عالي الجودة </li>
                            <li><i class="fas fa-check-circle"></i> متابعة يومية للطالب</li>
                        </ul>
                        <hr>
                        <a class="main-button icon-button" href="{{url("/skills/show/1")}}">مشاهدة الان</a>
                    </div>
                </div>

                </div>

            <div data-aos="fade-down" data-aos-duration="1500">
                <div class="col-md-4  col-sm-12 cartona">
                    <div>
                        <img class="img-fluid" src="{{asset("web/img/heart.jpg")}}" alt="">
                    </div>
                    <div class="cartona_desc">
                        <h2> الاحياء الصف الثاني الثانوي</h2>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> مجتمع تعليمي متكامل </li>
                            <li><i class="fas fa-check-circle"></i> محتوى عالي الجودة </li>
                            <li><i class="fas fa-check-circle"></i> متابعة يومية للطالب</li>
                        </ul>
                        <hr>
                        <a class="main-button icon-button" href="{{url("/skills/show/2")}}">مشاهدة الان</a>
                    </div>
                </div>
            </div>

                <div data-aos="fade-up" data-aos-duration="1000">
                <div class="col-md-4 right cartona">
                    <div>
                        <img class="img-fluid" src="{{asset("web/img/skeleton.jpg")}}" alt="">
                    </div>
                    <div class="cartona_desc">
                        <h2> الاحياء الصف الثالث الثانوي</h2>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> مجتمع تعليمي متكامل </li>
                            <li><i class="fas fa-check-circle"></i> محتوى عالي الجودة </li>
                            <li><i class="fas fa-check-circle"></i> متابعة يومية للطالب</li>
                        </ul>
                        <hr>
                        <a class="main-button icon-button" href="{{url("/skills/show/3")}}">مشاهدة الان</a>
                    </div>
                </div>
            </div>
            
        </div>

        </div>
</section>

{{-- sliderrr --}}



@endsection


@section('js')
    
<script>





//scroll
var y = $(window).scrollTop();  //your current y position on the page
function scrollBtn()
{
    $(window).scrollTop(y+750);
}
</script>


@endsection



