@extends('web.layout')
@section('title')
Exam Questions:
@endsection
@section('style')
<link href="{{ asset('web/css/TimeCircles.css')}}" rel="stylesheet">


@endsection


@section('main')
<!-- Hero-area -->

<!-- Blog -->
<div id="blog" class="questions-section">

    <!-- container -->
    <div class="container-fluid">

        <!-- row -->
        <div class="row">

            <div id="aside" class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item">المادة : {{$exam->name()}}</li>
                    <li class="list-group-item">عدد الاسئلة : {{$exam->questions_num}} سؤال</li>
                    <li class="list-group-item">المدة الزمنية : {{$exam->duration_h}} دقيقة</li>
                </ul>
                <div id="mydiv" class="duration-countdown" data-timer="{{$exam->duration_h * 60}}"></div>        
            </div>
            <!-- main blog -->
            <div id="main" class="col-md-9">
                <form id="exam-submit-form" action="/exams/submit/{{$exam->id}}" method="POST">
                    @csrf
                </form>

                <!-- blog post -->
                <div id="table_data" class="blog-post mb-5">
                    <p>
                        @foreach ($questions as $index => $ques)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <i class="fas fa-question"></i> {{ $loop->iteration }} - {{$ques->questionTitle()}} 
                              </h3>
                            </div>

                            <div class="ques_img">
                                @if ($ques->img)
                                <img style="float:left;" width="400px" height="250px" src="{{asset("uploads/$ques->img")}}" alt="">
                                @endif
                            </div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                      <input class="answer" type="radio" name="answers[{{$ques->id}}]" value="1" form="exam-submit-form" >
                                      <span>{{ $ques->questionOption1()}}</span>
                                      </label>
                                </div>
                                <div class="radio">
                                    <label>
                                      <input  class="answer" type="radio" name="answers[{{$ques->id}}]"  value="2" form="exam-submit-form">
                                      <span>{{ $ques->questionOption2()}}</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                      <input  class="answer" type="radio" name="answers[{{$ques->id}}]"  value="3" form="exam-submit-form">
                                      <span>{{ $ques->questionOption3()}}</span>
                                    </label> 
                                </div>
                                <div class="radio">
                                    <label>
                                      <input  class="answer" type="radio" name="answers[{{$ques->id}}]" value="4" form="exam-submit-form">
                                      <span>{{ $ques->questionOption4()}}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </p> 
                </div>
                <!-- /blog post -->

                <div>
                    <button  type="submit" form="exam-submit-form" class="main-button icon-button pull-left">تأكيد</button>
                    <button onclick="confirm('هل متأكد من الالغاء ؟') && closeExam(event)"   class="main-button icon-button btn-danger pull-left ml-sm">إلغاء</button>
                </div>
            </div>
            <!-- /main blog -->

            <!-- aside blog -->

            <!-- /aside blog -->

        </div>
        <!-- row -->
        <div class="row">

            <!-- pagination -->
            {{-- {{$questions->links('web.inc.pagintor')}}  --}}
            {{-- {!! $questions->links('web.inc.pagintor') !!} --}}

            <!-- pagination --> 

        </div>
    </div>
    <!-- container -->

</div>
<!-- /Blog -->



@endsection
@section('js')
<script type="text/javascript" src="{{ asset('web/js/TimeCircles.js') }}"></script>
<script>    
        
        history.pushState(null, document.title, location.href);
        window.addEventListener('popstate', function (event)
        {
        history.pushState(null, document.title, location.href);
        });

        function closeExam(event)
        {
            $('#exam-submit-form').submit();
            sessionStorage.clear();
            console.log('hello');
        }

        $(document).ready(function() {
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
			event.preventDefault();
			return false;
			}
		});
		});


        if(sessionStorage.getItem('end1'))
        {
            let end1 = sessionStorage.getItem('end1');
            $('#mydiv').data('timer',end1);
        }

        
        window.onbeforeunload = function() {
        $('#exam-submit-form').submit();
        return "Data will be lost if you leave the page, are you sure?";
        };


    $(".duration-countdown").TimeCircles({
        time:{
            Days:{
                show:false,
            }
        },
        count_past_zero: false,
    }).addListener(function(unit,value,total){
      if(total <=1)
      {
        $('#exam-submit-form').submit();
        sessionStorage.clear();
        return window.onbeforeunload = null;
      }
      else
      { 
        sessionStorage.setItem('end1', total);
        $("#exam-submit-form" ).submit(function( ) {
        sessionStorage.clear();
        return window.onbeforeunload = null;
        });   
      }
      
    });





</script>
@endsection
