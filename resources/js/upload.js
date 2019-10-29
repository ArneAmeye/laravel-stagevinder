$(document).ready(function() {
	/* ADD BUTTON WHEN UPLOAD CONTAINS FILE */
	$("#upload :input").change(function() {
		if ($(this).val()) {
			readURL(this);
			$("#button_upload").fadeIn(300);
		} else {
			$("#button_upload").fadeOut(300);
			$("#preview__card").fadeOut(650);
		}
	});

	/* SHOW PREVIEW OF THE IMAGE */
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$("#preview").css(
					"background-image",
					"url(" + e.target.result + ")"
				);
				$("#preview__card").fadeIn(650);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
});
