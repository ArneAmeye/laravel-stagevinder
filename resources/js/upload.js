$(document).ready(function() {
	/* ADD BUTTON WHEN UPLOAD CONTAINS FILE */
	$("#input__upload").change(function() {
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
				$("#upload__preview").css(
					"background-image",
					"url(" + e.target.result + ")"
				);
				$("#upload__preview").css(
					"height",
					"150px"
				);
				//$("#preview__card").fadeIn(650);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

	/* CHANGE STYLE OP DROPZONE ON DRAG OVER */
	$("#input__upload")
		.on("dragenter", function(e) {
			$(".upload__visual").addClass("upload__visual--active");
		})
		.on("dragleave dragend mouseout drop", function(e) {
			$(".upload__visual").removeClass("upload__visual--active");
		});
});