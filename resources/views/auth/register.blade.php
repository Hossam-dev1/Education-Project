@extends('web.layout')

@section('title')
SIGN UP
@endsection

@section('main')
    		<!-- Hero-area -->
			<section class="teacher">
				<div class="bg-image bg-header overlay" style="background-image:url({{asset('web/img/blog-post-background.jpg')}})"></div>
				<div class="header text-white">
					<h1 class="">التسجيل </h1>
					<p class="log_p">استمتع بسهولة التجربة وبمميزات التعليم الالكتروني.</p>
				</div>
			</section>
		<!-- /Hero-area -->

		<!-- Contact -->

			<!-- container -->
				<section class="login">


					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">
		
							<div class="col-md-6">
								<div class="log">
									<div class="log-head">
										<h2 class="">حساب جديد <i class="fas fa-user-plus"></i>	</h2>
										<p>لديك حساب بالفعل! <a href="{{url('login')}}">تسجيل الدخول الان</a></p>
										<p><a href="https://www.youtube.com/channel/UCqGsISX5O2tvS7aHaCGQ8pA" target="_blank">شاهد فديو طريقة التسجيل</a></p>
									</div>

									{{-- @include('web.inc.message') --}}
				
									<form method="POST" action="{{url('/register')}}">
										@csrf
										<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
											<label for="name">اسم الحساب</label>
											<input type="text" name="name" class="form-control" >
					
											<small class="text-danger">{{ $errors->first('name') }}</small>
										</div>
		
										<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
											<label for="email">البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" >
					
											<small class="text-danger">{{ $errors->first('email') }}</small>
										</div>
		
										<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
											<label for="phone">رقم الهاتف</label>
											<input type="text" name="phone" class="form-control" >
											
											<small class="text-danger">{{ $errors->first('phone') }}</small>
										</div>

												
										<div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
											<label for="level">الصف الدراسي</label>
											<select class="form-control" name="level" required focus>
												<option value="" disabled selected>اختر الصف</option>        
												<option value="1">الصف الاول</option>
												<option value="2">الصف الثاني</option>
												<option value="3">الصف الثالث</option>
											</select>
											<small class="text-danger">{{ $errors->first('area') }}</small>
										</div> 
		
										<div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
													<label for="area">اسم السنتر</label>
													<select class="form-control" name="area" required focus>
														<option value="" disabled selected>اختر السنتر</option>        
														<option>مكتب سمور </option>
														<option>سنتر الرحمة</option>
														<option>سنتر الرواد </option>
														<option>سنتر الصرح </option>
														<option>سنتر التبين </option>
														<option>سنتر الاخصاص </option>
														<option>سنتر الرحمة </option>
														<option>VIC 1</option>
														<option>VIC 2</option>													
														<option>Online</option>
													</select>
											<small class="text-danger">{{ $errors->first('area') }}</small>
										</div>
		
										<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
											<label for="password">كلمة السر</label>
											<input min="8" type="password" name="password" class="form-control" >
					
											<small class="text-danger">{{ $errors->first('password') }}</small>
										</div>
		
										<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
											<label for="password_confirmation">تاكيد كلمة السر</label>
											<input type="password" name="password_confirmation" class="form-control" >
					
											<small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
											<div class="form-group form-btn ">
												<button type="submit" class="main-button icon-button pull-right">إنشاء حساب</button>
											</div>

										</div>

									</form>
										</div>
								</div>
		
		
							</div>
							<!-- /login form -->
		
						</div>
			</section>
		
				<!-- row -->

					<!-- /login form -->

				<!-- /row -->

@endsection