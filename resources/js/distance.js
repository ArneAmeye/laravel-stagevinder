$(document).ready(function() {
	let api_url = "https://cors-anywhere.herokuapp.com/https://www.mapquestapi.com/directions/v2/route?";

	class Distance {
		static getLocation(api_url, id) {
			$.ajax({
				method: "GET",
			    url: "/getLocation",
			    data: {id: id},
			    success: function(data){
			      	if (data.status == "success") {
			      		if (!data.data.saved) {
			      			Distance.getDistance(data.data, api_url, id);
			      		} else {
			      			Distance.setDistance(data.data.distance, id);
			      		}
			      	}
			    }
			});
		}

		static getDistance(data, api_url, id) {
			let fromLocation = data.from;
			let toLocation = data.to;
			let key = data.key;
			let query = `&routeType=fastest&unit=k&from=${fromLocation}&to=${toLocation}`;
			fetch(`${api_url}key=${key}${query}`)
                .then(response => {
                    return response.json();
                })
                .then(json => {
                	Distance.addDistance(json.route.distance, id);
                	Distance.setDistance(json.route.distance, id);
                });
		}

		static addDistance(data, id) {
			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			$.ajax({
				method: "POST",
			    url: "/addLocation",
			    data: {id: id, data: data}
			});
		}

		static setDistance(data, id) {
			let distance = Math.round(data * 100) / 100;
            $(`.preview__text--distance[data-id=${id}]`).text(distance+" km");
		}
	}

	$.each($("*[data-id]"), function(i, v) {
		let id = $(v).data("id");
		Distance.getLocation(api_url, id);
	});
});