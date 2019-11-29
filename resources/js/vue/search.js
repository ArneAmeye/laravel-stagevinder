Vue.component("get", {
    template: `<a href="#">
		<div class="preview__inner">
			<img class="preview__image" src="@{{profile_picture}}">
			<div class="preview__text">
				<p class="preview__text--internship">
					@{{firstname}} @{{lastname}}
				</p>
				<p class="preview__text--position">
					@{{bio}}
				</p>
			</div>
		</div>
    </a>`,
    props: ["result"]
});

var app = new Vue({
    el: "body",
    data: {
        results: [],
        query: "irene"
    },
    mounted: function() {
        this.search();
    },
    methods: {
        search: function() {
            let that = this;
            // Clear the error message.
            this.error = "";
            // Empty the products array so we can fill it with the new products.
            this.products = [];

            // Making a get request to our API and passing the query to it.
            fetch("/api/search?q=" + this.query)
                .then(response => {
                    return response.json();
                })
                .then(json => {
                    console.log(json.users);
                    that.results.push(json.users);
                });

            // Clear the query.
            this.query = "";
        }
    }
});
