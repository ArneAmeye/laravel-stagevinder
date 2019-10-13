@extends("layouts/authentication")

@section('title')
    Login
@endsection
@section('stylesheet')
	{{ asset('css/pages/login.css') }}
@endsection
@section('content')
	<form action="{{ route('user.login') }}" method="post">
		@auth
			@component('components/alert')
				@slot('type', 'success')
				<ul class="alert__container">
					<li class="alert__item">
						Logged in successfully!
					</li>
				</ul>
			@endcomponent
		@endauth
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
						<a href="#"> Register </a>
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
						<i class="fa fa-facebook button__social__icon" aria-hidden="true"></i>
						Sign in with facebook
					</a>
				</div>
			</div>
			<p class="auth__text">
				Sign in with your regular account
			</p>
			<div class="input__container">
				<span class="input__addon">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
				<input type="email" name="email" class="input" placeholder="Email Address">
			</div>
			<div class="input__container">
				<span class="input__addon">
					<i class="fa fa-lock" aria-hidden="true"></i>
				</span>
				<input type="password" name="password" class="input" placeholder="Password">
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
@endsection

<!--<h1>Login</h1>
<a href="{{url('/fb-login')}}" class="btn btn-primary">Login with Facebook</a>-->