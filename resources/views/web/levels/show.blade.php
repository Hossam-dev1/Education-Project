@extends('web.layout')
@section('title')
{{ json_decode($level->name)->ar }}
@endsection

@section('main')


		<!-- /Header -->

		<!-- Hero-area -->
		<section class="teacher">
			<div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/blog-post-background.jpg')}})"></div>
			<div class="header text-white">
				<h1 class="">{{$level->name()}}</h1>
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
					<div id="main" class="col-md-9">
						
						<!-- row -->
						<div class="row">
							@foreach ($skills as $skill)
								
							<!-- single skill -->
							<div id="skill-blog" class="col-md-6">
								<div class="single-blog">
									<div class="blog-img">
										<a href="{{ url("skills/show/{$skill->id}")}}">
											<img class="img-fluid" src="{{asset("uploads/$skill->img")}}" alt="">
										</a>
									</div>
									<div class="blog-desc">
										<h2 class=""><a href="{{ url("skills/show/{$skill->id}")}}">{{$skill->name()}}.</a></h2>
									<div class="blog-meta">
                                        <h4>{{Carbon\Carbon::parse($skill->created_at)->format('d M, Y')}}</h4>
									</div>
								</div>
								</div>
							</div>
							@endforeach


						</div>
						<!-- /row -->

						<!-- row -->
						<div class="row">

							<!-- pagination -->
							{{-- {{$skills->links('web.inc.pagintor')}}  --}}
							<!-- pagination -->

						</div>
						<!-- /row -->
					</div>
					<!-- /main blog -->

					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- search widget -->

						<!-- /search widget -->

						<!-- category widget -->
						{{-- <div class="widget category-widget">
							<h3>الاعلانات</h3>
							@foreach ($allLevels as $oneLevel)
							<a class="category" href="{{ url("levels/show/{$oneLevel->id}")}}">
							{{ json_decode($oneLevel->name)->ar}}
							<span>{{$oneLevel->skills()->count()}}</span></a>

							@endforeach

						</div> --}}
						<!-- /category widget -->
					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->

		
		<!-- Footer -->

			<!-- container -->

			<!-- /container -->


			@endsection
@section('js')
	<script>
		    $(window).scroll(function ()
    {
      let x = $(window).scrollTop()
      
      if (x >= 90) 
      {
        $('.head').css('backgroundColor','#d7d7d7')
        $('.nav-link').css('color','#002347')
        // $('.logo_content').css('color','#002347')
      }
      else
      {
        $('.head').css('backgroundColor','transparent')
        $('.nav-link').css('color','white')
      }
      
    })
	</script>
@endsection
