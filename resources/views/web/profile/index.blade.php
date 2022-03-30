@extends('web.layout')
@section('title')
   Profile
@endsection
@section('main')
<!-- Hero-area -->
<section class="teacher">
    <div class="bg-image  overlay" style="background-image:url({{ asset('web/img/header1.jpg') }})"></div>
    <div class="header">
        <h1 class="text-white">حسابي الشخصي</h1>
        <h2 class="text-center"><i class="fas fa-user-circle"></i></h2>
    </div>
</section>

<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">


        <!-- row -->
        <div class="row">
            
            <div class="col-md-12 ">
                <h2 class="text-center text-dark">{{Auth::user()->name}}</h2>

            <table class="table table-responsive-sm">
               <thead>
                <tr>
                    <th>البريد الالكتروني</th> 
                    <tr class="text-center data">
                        <td >{{Auth::user()->email}}</td>
                    </tr>
                    <th>رقم الهاتف</th> 
                    <tr class="text-center data">
                        <td>{{Auth::user()->phone}}</td>
                    </tr>
                    <th>الصف الدراسي</th> 
                    <tr class="text-center data">
                        <td>{{Auth::user()->level}}</td>
                    </tr>
                    <th>اسم السنتر</th>
                    <tr class="text-center data">
                        <td>{{Auth::user()->area}}</td>
                    </tr>
                </tr>
               </thead>

            </table>
            </div>


            <div class="col-md-6">
                <div class="">
                <table class="table  table-avatar text-center exam-table">
                   <thead>
                        <tr>
                        <th>اسم الامتحان</th> 
                        <th> درجة الامتحان</th> 
                        <th>الوقت</th> 
                    </tr>
                   </thead>
    
                    <tbody>
                @foreach (Auth::user()->exams as $exam )
                <tr>
                <td>{{ $exam->name() }}</td>
                <td>{{ $exam->pivot->score }}</td>
                <td>{{ $exam->pivot->time_hours }} دقيقة</td>
                </tr>
                @endforeach
                    </tbody>
    
                </table>
                </div>
                </div>


            <!-- /login form -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->
@endsection
