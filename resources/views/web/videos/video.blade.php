@extends('web.layout')
@section('title')
  Levels - {{$video->Title}}
@endsection

@section('style')
<link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />

@endsection
@section('main')
		<!-- /Header -->
		<section class="teacher">
			<div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/blog-post-background.jpg')}})"></div>
			<div class="header text-white">
				<h2 class="video-title">{{$video->title}}</h2>
				<p class="video-desc">{{$video->subject}}</p>
			</div>
		</section>
		<!-- Hero-area -->

		<!-- /Hero-area -->
		<!-- Blog -->
		<section id="show-video" class="video">

			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-offset-2 ">
						<div id= "video-box"class="video-box">
							<video
							id="my-video"
							class="video-js"
							controls
							preload="auto"
							width="640"
							height="264"
							poster="MY_VIDEO_POSTER.jpg"
							data-setup="{}"
						  >
							<source src="{{asset("uploads/$video->video")}}" type="video/mp4" />
							<p class="vjs-no-js">
							  To view this video please enable JavaScript, and consider upgrading to a
							  web browser that
							  <a href="https://videojs.com/html5-video-support/" target="_blank"
								>supports HTML5 video</a
							  >
							</p>
						  </video>
						
							{{-- <video class="video-js" id="video-play" controlsList="nodownload noremote foobar" data-setup="{}">
								<source src="{{asset("uploads/$video->video")}}" type="video/mp4">
							</video>
							<div class="video-layer"></div>
							<div class="video-icon">
								<i class="fas fa-play video-btn"></i>
							</div> --}}
						</div>
					</div>
				</div>
				<!-- Modal -->
			</div>

		</section>
	
		<!-- /Blog -->

		<!-- Footer -->
		<!-- Footer -->
		@endsection

@section('js')
    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>

<script>

$(document).ready(function() 
{
  // Gets the video src from the data-src on each button
  $(".video-btn").click(function() {
    $('.video-layer').css('display', 'none');
    $(this).css('display', 'none');
    $('#video-play').trigger('play');
    $('#video-play').prop('controls', true);
        console.log("button clicked");
		
  });
});
</script>
@endsection