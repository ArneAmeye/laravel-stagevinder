<div class="search__container">
    <div>
        <form action="/search" method="GET" class="search__field">
			{{ csrf_field() }}
			<input type="text" name="" placeholder="Search" class="search__field--input">
			<Button class="search__field--btn">
				<i class="fas fa-search" aria-hidden="true"></i>
			</Button>
		</form>
    </div>
</div>
<div class="search__results__container">
    <ul>
        <li>test</li>
    </ul>
</div>