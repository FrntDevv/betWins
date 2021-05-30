$(document).ready(function () {
	$('#create-tournament-form').on('submit', function (e) {
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append('create_tournament', 'true');
		$.ajax({
			url: 'index.php?cricket-tournament-create=true',
			type: 'post',
			dataType: 'json',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				// if (response.success === 'true') {
				// 	swal.fire("Success", response.message, "success").then(() => window.location.href = "./dashboard");
				// } else {
				// 	swal.fire("Error", response.message, "Warning").then(() => location.reload());
				// }

			}
		})
	})


});