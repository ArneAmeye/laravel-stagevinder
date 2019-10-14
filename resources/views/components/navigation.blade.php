<nav class="navigation__container">
	<div class="navigation__scroll">
		<div class="navigation__inner">
			<div class="navigation__header">
				<img src="http://html.codedthemes.com/guru-able/files/assets/images/avatar-4.jpg" class="navigation__header__image">
				<div class="navigation__header__userInfo">
					<p class="navigation__header__name">
						John Doe
					</p>
					<span class="navigation__header__title">
						UX Designer
						<i class="fas fa-angle-down navigation__header__icon" aria-hidden="true"></i>
					</span>
				</div>
			</div>
			<div class="navigation__search">
				<input type="text" name="" placeholder="Search" class="navigation__search__input">
				<span class="navigation__search__icon">
					<i class="fas fa-search" aria-hidden="true"></i>
				</span>
			</div>
			<div class="navigation__title">
				Navigation
			</div>
			<ul class="navigation__items">
				<li class="navigation__item">
					<a href="/index.php" class="navigation__link {{ Request::is('/') ? 'navigation__link--current' : '' }}">
						<span class="navigation__link__icon">
							<i class="fas fa-home navigation__link__icon--center" aria-hidden="true"></i>
						</span>
						<span class="navigation__link__title">
							Home
						</span>
					</a>
				</li>
				<li class="navigation__item">
					<a href="/students" class="navigation__link {{ Request::is('students') ? 'navigation__link--current' : '' }}">
						<span class="navigation__link__icon">
							<i class="fas fa-graduation-cap navigation__link__icon--center" aria-hidden="true"></i>
						</span>
						<span class="navigation__link__title">
							Students
						</span>
					</a>
				</li>
				<li class="navigation__item">
					<a href="/companies" class="navigation__link {{ Request::is('companies') ? 'navigation__link--current' : '' }}">
						<span class="navigation__link__icon">
							<i class="fas fa-building navigation__link__icon--center" aria-hidden="true"></i>
						</span>
						<span class="navigation__link__title">
							Companies
						</span>
					</a>
				</li>
				<li class="navigation__item">
					<a href="internships" class="navigation__link {{ Request::is('internships') ? 'navigation__link--current' : '' }}">
						<span class="navigation__link__icon">
							<i class="fas fa-file-alt navigation__link__icon--center" aria-hidden="true"></i>
						</span>
						<span class="navigation__link__title">
							Internships
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>