$(document).ready(function () {

	$('#update-tournament-squad-form').on('submit', function (e) {
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append('squadUpdates', 'true');
		$.ajax({
			url: 'index.php?update-team-squad=true',
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