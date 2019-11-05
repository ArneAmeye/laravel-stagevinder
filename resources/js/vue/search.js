Vue.component("get", {
    template: `<a href="#">
		<div class="preview__inner">
			<img class="preview__image" src="@{{image}}">
			<div class="preview__text">
				<p class="preview__text--internship">
					@{{name}}
				</p>
				<p class="preview__text--position">
					@{{description }}
				</p>
			</div>
		</div>
	</a>`
});
