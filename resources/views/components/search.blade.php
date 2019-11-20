<div class="search__field__container">
	<div class="search__field__inner">
		<!--<div class="search__form">-->
			<!--<div class="search__field">-->
				<!--<input type="text" v-model="query" placeholder="Search" class="search__field--input">
				<Button class="search__field--btn" @click="search()">
					<i class="fas fa-search" aria-hidden="true"></i>
				</Button>-->
				<!--<p v-if="error">error</p>-->
			<!--</div>-->
		<!--</div>-->
		<form action="/search" method="get" class="search__form">
			{{ csrf_field() }}
			<div class="search__field">
				<input type="text" placeholder="Search" class="search__field--input">
				<Button class="search__field--btn">
					<i class="fas fa-search" aria-hidden="true"></i>
				</Button>
			</div>
		</form>
	</div>
</div>