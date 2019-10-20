<div class="alert alert--{{ $type }} alert--show" role="alert">
	<button type="button" class="alert__close">
		<i class="far fa-times-circle" aria-hidden="true"></i>
	</button>
	<p class="alert__text">
		<strong class="alert__text--bold">
			{{ $type }}!
		</strong>
		{{ $slot }}
	</p>
</div>