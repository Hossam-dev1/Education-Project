@extends('web.layout')
@section('title')
  Levels - {{$video->Title}}
@endsection


@section('main')
		<!-- /Header -->

			<section class="teacher">
				<div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/page-background.jpg')}})"></div>
				<ul class="blog-post-meta ">
					<h1 class="white-text">{{$video->title}}</h1>
					<li>
						<span>{{Carbon\Carbon::parse($video->created_at)->format('d M, Y')}}</span>
					</li> 
					{{-- <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{$video->users()->count()}}</a></li> --}}
				</ul>
			</section>

		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="exam-section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-9">
						@include('web.inc.message')

						<!-- blog post -->
						<div class="blog-post mb-5 text-center">
							<p>
								{{$video->subject}}
                            </p> 
							
							<button type="submit" form="start"  class="start" data-toggle="modal"
							data-target="#add-modal" >مشاهدة الفيديو <i class="fas fa-play-circle"></i></button>
						</div>
						

						<!-- /blog post -->
                        
                        <div class="text-center">
								@if ($videoFree)
									<form id="start" action="{{url("videos/start/{$video->id}")}}" method="post">
										@csrf
									</form>
								@endif
								{{-- if he coded before --}}
								@if(!$canSeeCodeBtn)
									<form id="start" action="{{url("videos/started/{$video->id}")}}" method="get">
										@csrf
									</form>
								@endif
                        </div>
					</div>
					<!-- /main blog -->	
                    
					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- exam details widget -->
                        <ul class="list-group">
                            <li class="list-group-item">المادة : {{$video->skill->name()}}</li>
							@if ($video->paid == '1')
							<li class="list-group-item">المحاضرة : مدفوعة</li>
							@else
							<li class="list-group-item">المحاضرة : مجانا</li>
							@endif
                        </ul>
						<!-- /exam details widget -->

						

					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->
			@if ($video->paid == 1)
					
				@if ($canSeeCodeBtn)

				<div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title text-dark">اضافة الكود</h3>
							</div>
							<div class="modal-body">
			
								<!-- /.card-header -->
								<!-- form start -->
							<form id="add_code" action="{{url("videos/start/{$video->id}")}}" method="POST">
								@csrf
											<div class="form-group">
												<label>الكود</label>
												<input type="text" name="code_path" class="form-control" required>
											</div>
								</form>
			
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
								<button type="submit" form="add_code" class="btn btn-primary">تأكيد</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				@endif

			@endif

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->


		<!-- Footer -->
		<!-- Footer -->
		@endsection

