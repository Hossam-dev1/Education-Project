<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Hamza Education - @yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <link rel="icon" href="{{asset('admin/img/icon2.png')}}">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/fontawesome.all.css') }}">


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('web/css/style.css') }}" />
    

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
  
    @yield('style')



</head>

<body>


<!-- Navigation -->
            <x-navbar></x-navbar>

    @yield('main')


    <!-- Footer -->
    <footer >
    
        <div class="container">
            <div class="row">
                <div  class="col-md-12">
                    {{-- <h2>Contact Us</h2> --}}
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <img src="{{ asset('web/img/hamza_education.png') }}" alt="logo">

                        <div class="w-form">
                        <div class="footer-newsletter-form">
                        <input type="email" class="input newsletter w-input" maxlength="256" name="Email" data-name="Email" placeholder="Enter your message" >
                        <input type="submit" value="Submit" data-wait="Please wait..." class="button-primary newsletter w-button">
                        </div>
                        </div>
                        <p><a class="guide" href="https://www.youtube.com/channel/UCqGsISX5O2tvS7aHaCGQ8pA">Youtube guide video</a></p>


                    </div>
                </div>
                    <div class="col-md-2">
                        <div class="content">
                            <h4><span>Pages</span></h4>
                            <a class="page_link" href="{{url('/')}}">Home</a>
                            <a class="page_link" href="/teacher">Teacher</a>
                            <a class="page_link" href="{{url('/register')}}">ٌRegister</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="content">
                            <h4><span>Contact</span></h4>
                            <h5><i class="icon fas fa-phone-alt"></i><p class="d-inline p-3">01116646302</p> </h5>
                            <h5><i class="icon fas fa-phone-alt"></i><p class="d-inline p-3">01069426890</p> </h5>
                            <h5><i class="icon fas fa-phone-alt"></i><p class="d-inline p-3">01110379666</p> </h5>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="content">
                            <h4><span>Follow</span></h4>
                            <h5><i class="icon fab fa-facebook"></i> <a class="nav_link p-3" href="https://www.facebook.com/hamza.education1/" target="_blank" >Facebook</a></h5>
                            <h5><i class="icon fab fa-youtube"></i> <a class="nav_link p-3" href="https://www.youtube.com/channel/UCqGsISX5O2tvS7aHaCGQ8pA" target="_blank" >Youtube</a></h5>
                            <h5><i class="icon far fa-envelope"></i> <a class="nav_link p-3" href="mailto:info@hamza-education.com" target="_blank" >Gmail</a></h5>
                        </div>
                    </div>


            </div>
            <div class="small">
                <div class="copy">
                    <h5>Copyright © 2022. All Rights Reserved.| Made With <i class="far fa-heart"></i> By<a href="https://www.facebook.com/7oss2mashr2f" target="_blank" rel="noopener noreferrer">7oSsaM</a>,<a href="https://www.facebook.com/Simulatr" target="_blank" rel="noopener noreferrer">Mahmoud</a></h5>
                </div>
            </div>
        </div>
    

    </footer>
    <!-- /Footer -->

    <!-- preloader -->
    <div id='preloader'>
        <div class='preloader'></div>
    </div>
    <!-- /preloader -->


    <!-- jQuery Plugins -->
    <script type="text/javascript" src="{{ asset('web/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    

    <script>
        $('#logout-link').click(function(e) {
            e.preventDefault() //to prevent go to a link
            $('#logout-form').submit()
        })

        AOS.init({
      offset: 200,
      duration: 1000,
      easing: 'ease-in-sine',
      delay: 500,
    });
    </script>



     <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


     <script>



         // Enable pusher logging - don't include this in production
        //  Pusher.logToConsole = true;

        //  var pusher = new Pusher('15eef3f9dca951066307', {
        //      cluster: 'eu'
        //  });

        //  var channel = pusher.subscribe('notifications-channel');
        //  channel.bind('exam-added', function(data) {
             
        //      toastr.success('New Exam Added!')
        //  });
     </script>


    @yield('js')
</body>

</html>
