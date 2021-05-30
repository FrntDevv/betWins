$(document).ready(function () {
	$('.hospitalLogout').on('click', function (e) { 
		e.preventDefault();
		$.ajax({
			url: 'index.php?hospitalLogout=true',
			type: 'post',
			dataType: 'json',
			data: {
				'hospitalLogout':'true'
			},
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href ="./home" );

				} else {
					swal.fire("Error", response.message, "Warning").then(() => location.reload());
				}

			}
		})
	})

	$('.userLogout').on('click', function (e) { 
		e.preventDefault();
		$.ajax({
			url: 'index.php?receiverLogout=true',
			type: 'post',
			dataType: 'json',
			data: {
				'receiverLogout':'true'
			},
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href ="./home" );

				} else {
					swal.fire("Error", response.message, "Warning").then(() => location.reload());
				}

			}
		})
	})
});