@extends('web.layout')

@section('title')
    Teacher
@endsection
@section('style')
    <body style="direction: rtl">
      
    </body>
@endsection

@section('main')
<!-- Hero-area -->

<!-- /Hero-area -->
<section class="teacher">
    <div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/cta.jpg')}})"></div>
    <div class="header">
        <h1 class="text-white">مدرسونا</h1>
        <h3>كل ما يتعلق بالمدرس و مواعيده</h3>
    </div>
</section>

<section class="teacher_Details">
  {{-- <h2><span>المدرس</span></h2> --}}
  <div class="container">
      <div class="row">
          
          <div class="col-md-12">
              <div class="content py-5">
                  <img class="img-fluid" src="{{ asset('web/img/teacher.jpeg') }}" alt="teacher">
                  <div class="det">
                      <h2>أستاذ\ أحمد سمور</h2>
                      <h4>في الأحياء والجيولوجيا</h4>
                      {{-- <small>01110379666</small>
                      <a href="tel:01110379666" target="_blank"><i class="fas fa-mobile-alt"></i></a>  --}}
                      <div class="icons">
                          <a href="https://m.facebook.com/2023109751131690/" target="_blank"><i class="fab f-ic fa-facebook-f "></i></a> 
                          <a href="https://www.youtube.com/channel/UCqGsISX5O2tvS7aHaCGQ8pA" target="_blank"><i class="fab fa-youtube"></i></a> 
                          <a href="mailto:Ahmedsamour559@gmail.com" target="_blank"><i class="far fa-envelope"></i></a> 
                          <a href="tel:01110379666" target="_blank"><i class="fas fa-phone-alt"></i></a> 
                      </div>

                      <button onclick="scrollBtn()" id="show_oppio" class="btn btn-primary">المواعيد</button>
                  </div>
              </div>
          </div>

      </div>

  </div>
</section>

<div class="oppiontments" style="display: none">
    {{-- <h2 class="text-center "><span>المواعيد</span></h2> --}}
    <div class="container tables" >
        <div class="row">
            <div class="icons text-center">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">الصف الاول</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">الصف الثاني</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">الصف الثالث</a></li>
              </ul>
            </div>

            
              <!-- Tab panes -->
              <div class="tab-content" > 
                <div role="tabpanel" class="tab-pane active" id="home">
                  {{-- Firsttt Level --}}
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">السنتر</th>
                        <th scope="col">المادة</th>
                        <th scope="col">اليوم</th>
                        <th scope="col">الساعة</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($first as $item)
                      <tr class="text-center">
                        <td>{{$item->center}}</td>
                        <td>{{$item->subject}}</td>
                        <td>{{$item->day}}</td>
                        <td>{{$item->time}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div role="tabpanel" class="tab-pane" id="profile">
                    {{-- Seconddd Level --}}
                    <table class="table " >
                      <thead>
                        <tr>
                          <th scope="col">السنتر</th>
                          <th scope="col">المادة</th>
                          <th scope="col">اليوم</th>
                          <th scope="col">الساعة</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($second as $item)
                        <tr class="text-center">
                          <td>{{$item->center}}</td>
                          <td>{{$item->subject}}</td>
                          <td>{{$item->day}}</td>
                          <td>{{$item->time}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane" id="messages">
                      {{-- Third Level --}}
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">السنتر</th>
                            <th scope="col">المادة</th>
                            <th scope="col">اليوم</th>
                            <th scope="col">الساعة</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($third as $item)
                          <tr class="text-center">
                            <td>{{$item->center}}</td>
                            <td>{{$item->subject}}</td>
                            <td>{{$item->day}}</td>
                            <td>{{$item->time}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
              </div>

        </div>
    </div>
    <!-- Nav tabs -->

  
  </div>
<!-- /Contact -->



@endsection

@section('js')
<script>
  $("#show_oppio").click(function(){
    $('.oppiontments').css('display','block');
  })

  var y = $(window).scrollTop();  //your current y position on the page
  function scrollBtn()
  {
      $(window).scrollTop(y+600);
  }
</script>
    
@endsection
