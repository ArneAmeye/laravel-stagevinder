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
			<div class="auth__branding">
			<img src="{{ asset('branding/mascotte.png') }}" alt="Kingtrainee logo" class="auth__branding__logo">
				<h1 class="auth__branding__name">KingTrainee</h1>
			</div>
			<div class="auth__header">
				<div class="auth__header__left">
					<h3 class="auth__header__title">
						Sign In
					</h3>
				</div>
				<div class="auth__header__right">
					<p class="auth__header__text">
						Don't have an account? 
						<a class="auth__header__text--link" href="register"> Register </a>
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
				<input type="email" name="email" class="input" placeholder="johndoe@stagevinder.be">
			</div>
			<div class="input__container">
				<span class="input__addon">
					<i class="fas fa-lock" aria-hidden="true"></i>
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

	<div class="homepage__reference">
		<div class="homepage__reference__message">
			<h4 class="homepage__reference__message--title">Hey trainee, want a sneak peak?</h4>
			<p class="homepage__reference__message--text">Want to be the king of all trainees ever? Be my guest, have a look at what's available in our internship kingdom!</p>
			<a href="/" class="button homepage__reference__button">Show internships!</a>
			<i class="fa fa-times homepage__reference__close"></i>
		</div>
	<img class="homepage__reference__mascotte" src="{{ asset('branding/mascotte.png')}}" alt="Kingtrainee mascotte">
	</div>

	@if($errors->any())
        @component('components/alert')
            @slot('type', 'error')
            <ul class="alert__container">
                @foreach($errors->all() as $error)
                    <li class="alert__item">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endcomponent
    @endif
@endsection