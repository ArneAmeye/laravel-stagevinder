$(document).ready(function() {

	$(".button--green").mouseover(function(){
		$(this).find(".fas").removeClass("fa-briefcase").addClass("fa-times");
		$(this).find("span").text("Remove");
	});

	$(".button--green").mouseout(function(){
		$(this).find(".fas").removeClass("fa-times").addClass("fa-briefcase");
		$(this).find("span").text("Applied");
	});

});