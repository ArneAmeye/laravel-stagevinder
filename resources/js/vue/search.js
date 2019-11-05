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

var app = new Vue({
    el: "body",
    data: {
        result: [],
        //loading: false,
        error: false,
        query: ""
    },
    mounted: function() {
        this.search();
    },
    methods: {
        search: function() {
            // Clear the error message.
            this.error = "";
            // Empty the products array so we can fill it with the new products.
            this.products = [];

            // Making a get request to our API and passing the query to it.
            this.$http.get("/api/search?q=" + this.query).then(response => {
                // If there was an error set the error message, if not fill the products array.
                response.body.error
                    ? (this.error = response.body.error)
                    : (this.products = response.body);
                // The request is finished, change the loading to false again.
                this.loading = false;
                // Clear the query.
                this.query = "";
            });
        }
    }
});
