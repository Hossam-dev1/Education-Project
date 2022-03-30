    <!-- Header -->
<header id="header">
    {{-- <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> Better check yourself, you're not looking too good.
      </div> --}}
        <div class="container-fluid ">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="{{url("/")}}">
                        <img src="{{ asset('web/img/hamza_education.png') }}" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Mobile toggle -->
                <button class="navbar-toggle">
                    <span></span>
                </button>
                <!-- /Mobile toggle -->
            </div>

<nav id="nav">
    <form id="logout-form" action="{{ url('logout')}}" method="POST" style="display: none;">
        @csrf
    </form>

    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a class="nav-link" href="{{ url('/') }}">الرئيسية</a></li>
        <li class="dropdown">
            <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span> الصف الدراسي</a>
            <ul class="dropdown-menu p-2">
                @foreach ($levels as $level)
                <li class="nav-link" class="my-5"><a  href="{{ url("/levels/show/{$level->id}") }}">
                    {{ $level->name() }}
                </a></li>
                @endforeach 
            </ul>
        </li>
        <li><a class="nav-link" href="{{ url('/teacher') }}">مدرسونا</a></li>
        {{-- <li><a class="nav-link" href="{{ url('/ads') }}">الاعلانات</a></li> --}}
         @guest
         <li><a id="home_link" class="" href="{{ url('login') }}">تسجيل الدخول</a></li>
         {{-- <li><a class="nav-link" href="{{ url('register') }}">حساب جديد </a></li> --}}
         @endguest

         @auth
            @if (Auth::user()->role == 'user')
            <li><a class="nav-link" href="{{ url('profile') }}">حسابي</a></li>

            @else
            <li><a class="nav-link"  href="{{ url('dashboard') }}">لوحة التحكم</a></li>
            @endif

            <li><a class="" id="logout-link" href="{{ url('#') }}">تسجيل الخروج</a></li>
         @endauth






    </ul>
</nav>

</div>

</header>

  
  

{{-- @section('js')
<script>

// $(window).scroll(function ()
//     {
//         let x = $(window).scrollTop();
        
//         if (x >= 100) 
//         {
//         $('#header').css('backgroundColor','#d7d7d7')
//         $('.nav-link').css('color','#002347')
//         }
//         else
//         {
//         $('#header').css('backgroundColor','transparent')
//         $('.nav-link').css('color','white')
//         }
//     })
// </script>
    
@endsection --}}

