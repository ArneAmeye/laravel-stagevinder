$(document).ready(function() {
	/* ADD BUTTON WHEN UPLOAD CONTAINS FILE */
	$("#upload :input").change(function() {
		if ($(this).val()) {
			$("#button_upload").fadeIn(300);
		} else {
			$("#button_upload").fadeOut(300);
		}
	});
});
