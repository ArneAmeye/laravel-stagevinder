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

        <h3 class="auth__header__title">Sign up</h3>
        <p class="auth__header__text">Already have an account? <a href="/login">Login</a> here!</p>
        <!--Firstname and lastname for students, name for company-->

        <!--Student-->
        <div class="container--disabled">
            <div class="input__container">
                <span class="input__addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="input" name ="firstname" placeholder="Enter your first name" value="empty">
            </div>

            <div class="input__container">
                <span class="input__addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="input" name ="lastname" placeholder="Enter your last name" value="empty">
            </div>
        </div>

        <!--Company-->
        <div class="container--active">
            <div class="input__container">
                <span class="input__addon">
                    <i class="fas fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="input" name ="name" placeholder="Enter your name">
            </div>
        </div>

        <!--General-->

        <div class="input__container">
            <span class="input__addon">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</span>
            <input type="email" class="input" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
        </div>

        <div class="input__container">
            <span class="input__addon">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</span>
            <input type="email" class="input" name="verificateEmail" aria-describedby="emailHelp" placeholder="Verify your email">
        </div>

        <div class="input__container">
            <span class="input__addon">
	    		<i class="fa fa-lock" aria-hidden="true"></i>
			</span>
            <input type="password" class="input" name="password" placeholder="Password">
        </div>

        <p class=auth__text>Check if you are a student!</p>
        <div class="slider">
            <div class="slider__container slider__container--disabled">
                <div class="slider__item slider__item--disabled">
                    <input type="checkbox" name="isStudent" class="slider__item--checkbox">
                </div>
            </div>
            <div>
            <label for="checkbox" class="slider__item--label auth__header__text">You are a company!</label>
            </div>
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