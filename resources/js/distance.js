$(document).ready(function() {
	let api_url = "http://www.mapquestapi.com/directions/v2/route?";

	class Distance {
		static getLocation(api_url, id) {
			$.ajax({
				method: "GET",
			    url: "/getLocation",
			    data: {id: id},
			    success: function(data){
			    	console.log(data);
			      	if (data.status == "success") {
			      		Distance.getDistance(data.data, api_url, id);
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
                	let distance = Math.round(json.route.distance * 100) / 100;
                    $(`.preview__text--distance[data-id=${id}]`).text(distance+" km");
                    //json.route.distance
                });
		}
	}

	/*let amount = $("*[data-id]").length;
	for (var i = 0; i < amount; i++) {
		let id = $(this).data("id");
		console.log(id);
		Distance.getLocation(api_url, id);
	}*/

	$.each($("*[data-id]"), function(i, v) {
		let id = $(v).data("id");
		Distance.getLocation(api_url, id);
	});
});