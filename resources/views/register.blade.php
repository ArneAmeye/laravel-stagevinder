@extends("layouts/authentication")

@section('title')
    Register
@endsection
@section('stylesheet')
	{{ asset('css/pages/register.css') }}
@endsection
@section('content')
    <form action="{{ route('user.register') }}" method="post" class="auth__box">
        {{csrf_field()}}
        <div class="auth__branding">
            <img src="{{ asset('branding/mascotte.png') }}" alt="Kingtrainee logo" class="auth__branding__logo">
            <h1 class="auth__branding__name">KingTrainee</h1>
        </div>
        <h3 class="auth__header__title">Sign up</h3>
        <p class="auth__header__text">Already have an account? <a class="auth__header__text--link" href="/login">Login</a> here!</p>
        <!--Firstname and lastname for students, name for company-->

        <!--Social signup with Facebook-->
        <p class="auth__text">
			Sign up easily with your social account:
		</p>
		<div class="auth__buttons">
			<div class="auth__button">
				<a href="{{ url('/fb-login') }}" class="button__social">
					<i class="fab fa-facebook-f button__social__icon" aria-hidden="true"></i>
					Sign up with facebook
				</a>
			</div>
		</div>

        <!--Checkbox for student/company signup-->
        <p class=auth__text>Regular sign up. Are you a company or a student?</p>
        <div class="slider">
            <div class="slider__container slider__container--disabled">
                <div class="slider__item slider__item--disabled">
                    <input type="checkbox" name="isCompany" class="slider__item--checkbox">
                </div>
            </div>
            <div>
            <label for="checkbox" class="slider__item--label auth__header__text">Now you are a student!</label>
            </div>
        </div>

        <!--Student-->
        <div class="container--active">
            <div class="input__container">
                <span class="input__addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="input" name ="firstname" placeholder="Enter your first name" value="{{old('firstname')}}">
            </div>

            <div class="input__container">
                <span class="input__addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="input" name ="lastname" placeholder="Enter your last name" value="{{old('lastname')}}">
            </div>
        </div>

        <!--Company-->
        <div class="container--disabled">
            <div class="input__container">
                <span class="input__addon">
                    <i class="fas fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="input" name ="name" placeholder="Enter your company name" value="{{old('name')}}">
            </div>
        </div>

        <!--General-->

        <div class="input__container">
            <span class="input__addon">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</span>
            <input type="email" class="input" name="email" aria-describedby="emailHelp" placeholder="Enter your email" value="{{old('email')}}">
        </div>
        <div class="input__container">
            <span class="input__addon">
	    		<i class="fa fa-lock" aria-hidden="true"></i>
			</span>
            <input type="password" class="input" name="password" placeholder="Password">
        </div>

        <button type="submit" class="button button--fullWidth">Sign up</button>
    </form>

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