<div class="search__field__container">
	<div class="search__field__inner">
		<form action="/search" method="GET" class="search__form">
			<div class="search__field">
				{{ csrf_field() }}
				<input type="text" name="" placeholder="Search" class="search__field--input">
				<Button class="search__field--btn">
					<i class="fas fa-search" aria-hidden="true"></i>
				</Button>
			</div>
		</form>
	</div>
</div>