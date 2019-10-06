<div class="breadcrumb__container">
	<div class="breadcrumb__inner">
		<div class="breadcrumb__info breadcrumb__info--big">
			<i class="fa fa-user breadcrumb__info__icon" aria-hidden="true"></i>
			<div class="breadcrumb__info__mobile--inline">
				<h4 class="breadcrumb__info__title">
					User Profile
				</h4>
				<span class="breadcrumb__info__text">
					lorem ipsum dolor sit amet, consectetur adipisicing elit
				</span>
			</div>
		</div>
		<div class="breadcrumb__info breadcrumb__info--small">
			<div class="breadcrumb__info__links">
				<ul>
					<li class="breadcrumb__info__linkContainer">
						<a href="http://homestead.test/index.php" class="breadcrumb__info__link">
							<i class="fa fa-home" aria-hidden="true"></i>
						</a>
					</li>
					{{ $breadcrumb }}
				</ul>
			</div>
		</div>
	</div>
</div>