@extends('web.layout')
@section('title')
  Levels - {{$exam->name()}}
@endsection


@section('main')
		<!-- /Header -->

		<!-- Hero-area -->
		<section class="teacher">
			<div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/.jpg')}})"></div>
			<ul class="blog-post-meta ">
				<h1 class="white-text">{{$exam->name()}}</h1>
				<li>
					<span>{{Carbon\Carbon::parse($exam->created_at)->format('d M, Y')}}</span>
				</li> || 
				<li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{$exam->users()->count()}}</a></li>
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
							<div class="header">
								<h1 class="text-dark">{{$exam->name()}}</h1>
							</div>
							<p>
								{{$exam->desc()}}
                            </p>  
							<div class="text-center">
								@if ($canSeeCodeBtn)
								<button type="submit" form="start"  class="main-button icon-button" data-toggle="modal"
								data-target="#add-modal" >ابدا الأمتحان </button>
								@endif 
							</div>

							
						</div>
						<!-- /blog post -->
                        
                        <div class="text-center">
							@if ($examFree)
							<form id="free_exam" action="{{url("exams/start/{$exam->id}")}}" method="POST">
								@csrf
								<button type="submit" form="free_exam"  class="main-button icon-button" 
								>ابدا الامتحان</button>
							</form>
							@endif
                        </div>
					</div>
					<!-- /main blog -->
                    
					<!-- aside blog -->
					<div id="aside" class="col-md-3">
						<!-- exam details widget -->
                        <ul class="list-group">
                            <li class="list-group-item">المادة : {{$exam->skill->name()}}</li>
                            <li class="list-group-item">عدد الاسئلة : {{$exam->questions_num}} سؤال</li>
                            <li class="list-group-item">المدة الزمنية : {{$exam->duration_h}} دقيقة</li>
                        </ul>
					</div>
					<!-- /aside blog -->

				</div>
			</div>

				<!-- row -->
				@if ($exam->paid == 1)

				@if ($canSeeCodeBtn)

				<div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title text-dark">استخدام الكود </h3>
							</div>
							<div class="modal-body">
			
								<!-- /.card-header -->
								<!-- form start -->
							<form id="add_code" action="{{url("exams/start/{$exam->id}")}}" method="POST">
								@csrf
											<div class="form-group">
												<label>الكود</label>
												<input type="text" name="code_path" class="form-control" required>
											</div>
								</form>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
								<button type="submit" form="add_code" class="btn btn-primary">تاكيد</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				@endif
			@endif

			<!-- container -->

		</div>
		<!-- /Blog -->

		<!-- Footer -->
		<!-- Footer -->
		@endsection

@section('js')
	
	<script>
		        
		history.pushState(null, document.title, location.href);
        window.addEventListener('popstate', function (event)
        {
        history.pushState(null, document.title, location.href);
        });


		
	</script>
@endsection