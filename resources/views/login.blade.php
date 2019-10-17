@extends("layouts/authentication")

@section('title')
    Login
@endsection
@section('stylesheet')
	{{ asset('css/pages/login.css') }}
@endsection
@section('content')
	<form action="{{ route('user.login') }}" method="post">
		{{ csrf_field() }}

		<div class="auth__box">
			<div class="auth__header">
				<div class="auth__header__left">
					<h3 class="auth__header__title">
						Sign In
					</h3>
				</div>
				<div class="auth__header__right">
					<p class="auth__header__text">
						Don't have an account? 
						<a href="register"> Register </a>
						here for free!
					</p>
				</div>
			</div>
			<p class="auth__text">
				Sign in easily with your social account:
			</p>
			<div class="auth__buttons">
				<div class="auth__button">
					<a href="{{ url('/fb-login') }}" class="button__social">
						<i class="fab fa-facebook-f button__social__icon" aria-hidden="true"></i>
						Sign in with facebook
					</a>
				</div>
			</div>
			<p class="auth__text">
				Sign in with your regular account
			</p>
			<div class="input__container">
				<span class="input__addon">
					<i class="fas fa-envelope" aria-hidden="true"></i>
				</span>
				<input type="email" name="email" class="input" placeholder="Email Address" value="lars@stagevinder.be">
			</div>
			<div class="input__container">
				<span class="input__addon">
					<i class="fas fa-lock" aria-hidden="true"></i>
				</span>
				<input type="password" name="password" class="input" placeholder="Password" value="password">
			</div>
			<div class="radios__container">
				<div class="radio__container">
					<label class="radio__label">
						<input type="radio" name="user_type" checked="checked" class="radio" value="student">
						<i class="radio__visual"></i>
						Student
					</label>
				</div>
				<div class="radio__container">
					<label class="radio__label">
						<input type="radio" name="user_type" class="radio" value="company">
						<i class="radio__visual"></i>
						Company
					</label>
				</div>
			</div>
			<div class="auth__checkbox clearfix">
				<div class="checkbox__container">
					<label class="checkbox__label">
						<input type="checkbox" name="remember" class="checkbox">
						<span class="checkbox__visual">
							<i class="fa fa-check checkbox__visual__icon" aria-hidden="true"></i>
						</span>
						<span class="checkbox__text">
							Remember me
						</span>
					</label>
				</div>
				<div class="auth__forgot">
					<a href="#" class="auth__forgot__text">
						Forgot Password?
					</a>
				</div>
				<div class="auth__login">
					<button class="button button--fullWidth">SIGN IN</button>
				</div>
			</div>
		</div>
	</form>

	@if (\Session::has('error'))
	    @component('components/alert')
			@slot('type', 'error')
			<ul class="alert__container">
				<li class="alert__item">
					{!! \Session::get('error') !!}
				</li>
			</ul>
		@endcomponent
	@endif
@endsection