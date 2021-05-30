$(document).ready(function () {
	
	$('#tournaments-details-form').on('submit', function (e) {
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append('tournamentDetailsUpdate', 'true');
		$.ajax({
			url: 'index.php?tournamentDetails=true',
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
	$('#match-details-form').on('submit', function (e) {
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append('matchDetailsUpdate', 'true');
		$.ajax({
			url: 'index.php?matchDetails=true',
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