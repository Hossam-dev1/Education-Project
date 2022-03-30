
@extends('web.layout')

@section('title')
SIGN IN
@endsection

@section('main')
<section class="teacher">
    <div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/blog-post-background.jpg')}})"></div>
    <div class="header text-white">
        <h1 class="">التسجيل </h1>
        <p class="log_p">استمتع بسهولة التجربة وبمميزات التعليم الالكتروني.</p>
    </div>
</section>
		<!-- /Hero-area -->

		<!-- Contact -->
<section class="login">


			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- login form -->
					<div class="col-md-6">
						<div class="log">
							<div class="log-head">
								<h2 class=""> تسجيل الدخول <i class="fas fa-sign-in-alt"></i></h2>
								<p>ليس لديك حساب؟ <a href="{{url('register')}}"> انشاء حساب جديد</a></p>
							</div>

							@include('web.inc.message')
							<form method="POST" action="{{url('login')}}">
                                @csrf
									<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
										<label for="phone">رقم الهاتف</label>
										<input type="text" name="phone" class="form-control" >
				
										<small class="text-danger">{{ $errors->first('phone') }}</small>
									</div>
									<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<label for="password">كلمة السر</label>
										<input type="password" name="password" class="form-control" >
				
										<small class="text-danger">{{ $errors->first('password') }}</small>
										<br>
										<input class="input" type="checkbox" name="remember"> تذكرني
										<br>
										<div class="form-group form-btn ">
											<button class="main-button icon-button pull-right" type="submit">سجل الدخول الان </button>
										</div>
									</div>
									

								</div>
						</div>


					</div>
					<!-- /login form -->

				</div>
	</section>

				<!-- /row -->

			<!-- /container -->

        @endsection