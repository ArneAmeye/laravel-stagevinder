@php
	$navigationOfUser = [
		["name" => "Home", "url" => "index.php", "icon" => "fa-home"],
		["name" => "Companies", "url" => "companies", "icon" => "fa-building"],
		["name" => "Internships", "url" => "internships", "icon" => "fa-file-alt"]
	];
	$navigationOfGuest = [
		["name" => "Sign in", "url" => "/login", "icon" => "fa-sign-in-alt"],
		["name" => "Sign up", "url" => "/register", "icon" => "fa-user-plus"],
	]
@endphp
<nav class="navigation__container">
	<div class="navigation__scroll">
		<div class="navigation__inner">
			@if(Auth::check())
			@if(Session::has('user'))
			<div class="navigation__header">
				@if (Session::get('user')->type == 'student')
					<img src="/images/students/profile_picture/{{ Session::get('user')->profile_picture }}" class="navigation__header__image">
				@elseif (Session::get('user')->type == 'company')
					<img src="/images/companies/profile_picture/{{ Session::get('user')->profile_picture }}" class="navigation__header__image">
				@endif
				<div class="navigation__header__userInfo">
					<p class="navigation__header__name">
				        @if (Session::get('user')->type == 'student')
							{{ Session::get('user')->firstname }} {{ Session::get('user')->lastname }}
						@elseif (Session::get('user')->type == 'company')
							{{ Session::get('user')->name }}
						@endif
					</p>
					<span class="navigation__header__title">
						@if (Session::get('user')->type == 'student')
							{{ Session::get('user')->field_study }}
						@elseif (Session::get('user')->type == 'company')
							{{ Session::get('user')->field_sector }}
						@endif
					</span>
				</div>
			</div>
			@else
			//login here
			@endif
			@endif
			<div class="navigation__search">
				<form action="/search" method="GET">
					{{ csrf_field() }}
					<input type="text" name="" placeholder="Search" class="navigation__search__input">
					<Button class="navigation__search__icon">
						<i class="fas fa-search" aria-hidden="true"></i>
					</Button>
				</form>
			</div>
			<div class="navigation__title"></div>
				Navigation
			</div>
			@if(Auth::check() and Session::has('user'))
			<ul class="navigation__items">
				@foreach($navigationOfUser as $nav)
				<li class="navigation__item">
					<a href="/{{ $nav['url'] }}" class="navigation__link {{ strpos($_SERVER['REQUEST_URI'], $nav['url']) || $_SERVER['REQUEST_URI'].$nav['url'] == '/index.php' ? 'navigation__link--current' : '' }}">
						<span class="navigation__link__icon">
							<i class="fas {{$nav['icon']}} navigation__link__icon--center" aria-hidden="true"></i>
						</span>
						<span class="navigation__link__title">
							{{$nav['name']}}
						</span>
					</a>
				</li>
				@endforeach
			</ul>
			@endif
			@if(!Auth::check() or !Session::has('user'))
			<ul class="navigation__items">
				@foreach($navigationOfGuest as $nav)
				<li class="navigation__item">
					<a href="{{ $nav['url'] }}" class="navigation__link">
						<span class="navigation__link__icon">
							<i class="fas {{$nav['icon']}} navigation__link__icon--center" aria-hidden="true"></i>
						</span>
						<span class="navigation__link__title">
							{{$nav['name']}}
						</span>
					</a>
				</li>
				@endforeach
			</ul>
			@endif
		</div>
	</div>
</nav>