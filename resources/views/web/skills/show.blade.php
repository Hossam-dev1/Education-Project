@extends('web.layout')
@section('title')
{{$skill->name()}}
@endsection

@section('main')
		<!-- /Header -->

		<!-- Hero-area -->
		<section class="teacher">
			<div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/blog-post-background.jpg')}})"></div>
			<div class="header text-white">
				<h1 class="">{{$skill->name()}}</h1>
			</div>
		</section>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
		<div id="main" class="col-md-12">
						{{-- Videooooooooooos --}}


		<div class="row ">
			<h1 class="text-center "><span>المحاضرات <i class="far fa-play-circle"></i></span> </h1>
			
			@if($videos->isEmpty())
			<div class="alert alert-info py-4 text-center">
				<p>لم يتم رفع اي فديوهات شرح بعد.</p>
			</div>
			@endif
			@foreach ($videos as $video)

			<div class="col-md-4">   
				<div class="single-blog">
					@if ($video->paid == '0')
					<div class="ribbon ribbon-top-left"><span>مجانا</span></div>
					@endif
					<div class="blog-img">
						<a href="{{url("videos/show/{$video->id}")}}">
							<img src="{{asset("uploads/$video->video_cover")}}" alt="">
						</a>
					</div>
					<div class="blog-desc">
						<h3><a href="{{url("videos/show/{$video->id}")}}">{{$video->title}}.</a></h3>
						<div class="blog-meta">
							<span>{{Carbon\Carbon::parse($video->created_at)->format('d M, Y')}}</span>
						</div>
					</div>

				</div>
			</div>
			@endforeach

	</div>
						<!-- /row -->
						{{-- Examsssss --}}

		<!-- row -->
		<div class="row ex">
			<h1 class="text-center "><span>الامتحانات <i class="far fa-clipboard"></i></span></h1>
			
			@if($exams->isEmpty())
			<div class="alert alert-success py-4 text-center">
				<p>لم يتم رفع اي امتحانات بعد.</p>
			</div>
			@endif
			@foreach ($exams as $exam)

			<div class="col-md-4"> 
				<div class="single-blog">
					@if ($exam->paid == '0')
					<div class="ribbon ribbon-top-left"><span>مجانا</span></div>
					@endif
					<div class="blog-img">
						<a href="{{url("exams/show/{$exam->id}")}}">
							<img src="{{asset("uploads/$exam->img")}}" alt="">
						</a>
					</div>
					<div class="blog-desc">
					<h3><a href="{{url("exams/show/{$exam->id}")}}">{{$exam->name()}}.</a></h3>
					<div class="blog-meta">
						<span>{{Carbon\Carbon::parse($exam->created_at)->format('d M, Y')}}</span>
						@if ($exam->answer_model)
						<div class="pull-right">
							<a href="{{url("exams/download-pdf/$exam->id")}}" class="btn btn-primary model-answer">نموذج الاجابة</a>
						</div>
						@endif
					</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
					</div>
					<!-- /main blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->

		<!-- Footer -->
		
		@endsection
		<!-- Footer -->

