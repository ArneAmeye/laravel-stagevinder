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
		<ul class="header__options__items--left header__options__items--desktop">
			<form class="header__search" action ="/search" method="GET">
				{{ csrf_field() }}
				<input type="text" name="search" placeholder="Search" class="header__search--input header__options__search">
				<Button class="header__search--btn header__options__link">
					<i class="fas fa-search" aria-hidden="true"></i>
				</Button>
			</form>
		</ul>
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
					<img src="/images/students/profile_picture/{{ Session::get('user')->profile_picture }}" class="header__options__profilePic">
					<p class="header__options__name">
						@if (Session::get('user')->type == 'student')
							{{ Session::get('user')->firstname }} {{ Session::get('user')->lastname }}
						@elseif (Session::get('user')->type == 'company')
							{{ Session::get('user')->name }}
						@endif
					</p>
					<i class="fas fa-angle-down header__options__more" aria-hidden="true"></i>
				</a>
				<ul class="options__more__items">
					<li class="options__more__item">
						<a href="#" class="options__more__link">
							<i class="fa fa-cog options__more__icon" aria-hidden="true"></i>
							Settings
						</a>
					</li>
					<li class="options__more__item">
						<a href="@if (Session::get('user')->type == 'student')/students/{{ Session::get('user')->id }}@elseif (Session::get('user')->type == 'company')/companies/{{ Session::get('user')->id }}@endif" class="options__more__link">
							<i class="fa fa-user options__more__icon" aria-hidden="true"></i>
							Profile
						</a>
					</li>
					<li class="options__more__item">
						<a href="#" class="options__more__link">
							<i class="fa fa-envelope options__more__icon" aria-hidden="true"></i>
							My Messages
						</a>
					</li>
					<li class="options__more__item">
						<a href="#" class="options__more__link">
							<i class="fa fa-lock options__more__icon" aria-hidden="true"></i>
							Lock Screen
						</a>
					</li>
					<li class="options__more__item">
						<a href="{{ route('user.logout') }}" class="options__more__link">
							<i class="fas fa-sign-out-alt options__more__icon" aria-hidden="true"></i>
							Logout
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</header>