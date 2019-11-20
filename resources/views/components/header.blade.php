@php
	$headerOfUser = [
		["name" => "Settings", "href" => "#", "icon" => "fa-cog"],
		["name" => "Profile", "href" => `@if (Session::get('user')->type == 'student')/students/{{ Session::get('user')->id }}@elseif (Session::get('user')->type == 'company')/companies/{{ Session::get('user')->id }}@endif`, "icon" => "fa-user"],
		["name" => "My Messages", "href" => "#", "icon" => "fa-envelope"],
		["name" => "Lock Screen", "href" => "#", "icon" => "fa-lock"],
		["name" => "Logout", "href" => "/logout", "icon" => "fa-sign-out-alt"]
	];
@endphp
<header class="header__container">
	<div class="header__logo__inner">
		<a href="#" class="header__link">
			<i class="fas fa-bars header__menu__icon"></i>
		</a>
		<a href="index.php" class="header__logo">
			<img src="http://html.codedthemes.com/guru-able/files/assets/images/logo.png" class="header__logo__image">
		</a>
		<a href="#" class="header__options header__options--mobile">
			<i class="fas fa-ellipsis-h header__options__icon" aria-hidden="true"></i>
		</a>
	</div>
	<div class="header__options__container clearfix">
		<!--<ul class="header__options__items--left header__options__items--desktop">
			<form class="header__search" action ="/search" method="GET">
				{{ csrf_field() }}
				<input type="text" name="search" placeholder="Search" class="header__search--input header__options__search">
				<Button class="header__search--btn header__options__link">
					<i class="fas fa-search" aria-hidden="true"></i>
				</Button>
			</form>
		</ul>-->
		@if(Auth::check())
			<ul class="header__options__items">
				<li class="header__options__item">
					<a href="#" class="header__options__link">
						<i class="fas fa-bell header__options__icon" aria-hidden="true"></i>
						<span class="header__options__badge header__options__badge--pink"></span>
					</a>
				</li>
				<li class="header__options__item">
					<a href="#" class="header__options__link">
						<i class="fas fa-comments header__options__icon" aria-hidden="true"></i>
						<span class="header__options__badge header__options__badge--green"></span>
					</a>
				</li>
				<li class="header__options__item">
				<a href="#" class="header__options__link">
					@if (Session::get('user')->type == 'student')
						<img src="/images/students/profile_picture/{{ Session::get('user')->profile_picture }}" class="navigation__header__image">
					@elseif (Session::get('user')->type == 'company')
						<img src="/images/companies/profile_picture/{{ Session::get('user')->profile_picture }}" class="navigation__header__image">
					@endif
					<p class="header__options__name">
						@if (Session::get('user')->type == 'student')
							{{ Session::get('user')->firstname }} {{ Session::get('user')->lastname }}
						@elseif (Session::get('user')->type == 'company')
							{{ Session::get('user')->name }}
						@endif
					</p>
					<i class="fas fa-angle-down header__options__more" aria-hidden="true"></i>
				</a>
				<li class="header__options__item">
					<ul class="options__more__items">
						@foreach($headerOfUser as $item)
							<li class="options__more__item">
								<a href="{{$item['href']}}" class="options__more__link">
									<i class="fa {{$item['icon']}} options__more__icon" aria-hidden="true"></i>
									{{$item['name']}}
								</a>
							</li>
						@endforeach
					</ul>
				</li>
			</ul>
		@endif
	</div>
</header>