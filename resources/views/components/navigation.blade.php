@php
	/*Array = name, url, icon and */
	$navigationOfUser = [
		["name" => "Home", "url" => "/index.php", "icon" => "fa-home"],
		["name" => "Students", "url" => "/students", "icon" => "fa-graduation-cap"],
		["name" => "Companies", "url" => "/companies", "icon" => "fa-building"],
		["name" => "Internships", "url" => "/internships", "icon" => "fa-file-alt"]
	];
	$navigationOfGuest = [
		["name" => "Sign in", "url" => "/login", "icon" => "fa-home"],
		["name" => "Sign up", "url" => "/register", "icon" => "fa-graduation-cap"],
	]
@endphp
<nav class="navigation__container">
	<div class="navigation__scroll">
		<div class="navigation__inner">
			@if(Auth::check())
			<div class="navigation__header">
				<img src="http://html.codedthemes.com/guru-able/files/assets/images/avatar-4.jpg" class="navigation__header__image">
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
			<div class="navigation__title">
				Navigation
			</div>
			@if(Auth::check())
			<ul class="navigation__items">
				@foreach($navigationOfUser as $nav)
				<li class="navigation__item">
					<a href="{{ $nav['url'] }}" class="navigation__link {{ Request::is('/') ? 'navigation__link--current' : '' }}">
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
			@if(!Auth::check())
			<ul class="navigation__items">
				@foreach($navigationOfGuest as $nav)
				<li class="navigation__item">
					<a href="{{ $nav['url'] }}" class="navigation__link {{ Request::is('/') ? 'navigation__link--current' : '' }}">
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