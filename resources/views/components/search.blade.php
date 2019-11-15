<div class="search__field__container">
	<div class="search__field__inner">
		<div class="search__form"></div>
			<div class="search__field">
				{{ csrf_field() }}
				<input type="text" v-model="query" placeholder="Search" class="search__field--input">
				<Button class="search__field--btn" @click="search()">
					<i class="fas fa-search" aria-hidden="true"></i>
				</Button>
				<!--<p v-if="error">error</p>-->
			</div>
		</div>
	</div>
</div>