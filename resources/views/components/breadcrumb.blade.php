<div class="breadcrumb__container">
	<div class="breadcrumb__inner">
		<div class="breadcrumb__info breadcrumb__info--big">
			<i class="fas {{ $icon }} breadcrumb__info__icon" aria-hidden="true"></i>
			<div class="breadcrumb__info__mobile--inline">
				<h4 class="breadcrumb__info__title">
					{{ $title }}
				</h4>
				<span class="breadcrumb__info__text">
						{{$sector}}
				</span>
			</div>
		</div>
		<div class="breadcrumb__info breadcrumb__info--small">
			<div class="breadcrumb__info__links">
				<ul>
					<li class="breadcrumb__info__linkContainer">
						<a href="{{ url('/') }}" class="breadcrumb__info__link">
							<i class="fas fa-home" aria-hidden="true"></i>
						</a>
					</li>
					{{ $breadcrumb }}
				</ul>
			</div>
		</div>
	</div>
</div>