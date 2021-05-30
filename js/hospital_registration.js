$(document).ready(function () {
	
	$('#hospitalSignupForm').on('submit', function (e) {

		e.preventDefault();

		var formdata = new FormData(this);
		formdata.append('hospital_registration', true);
		$.ajax({
			url: 'index.php?hospital_registration=true',
			type: 'post',
			dataType: 'json',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href = base_url + '/login');
				} else {
					swal.fire("Error", response.message, "Warning");
				}

			}
		})
	})

})