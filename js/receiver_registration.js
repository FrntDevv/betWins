$(document).ready(function () {
	
	$('#receiverSignupForm').on('submit', function (e) {

		e.preventDefault();

		var formdata = new FormData(this);
		formdata.append('receiver_registration', true);
		$.ajax({
			url: 'index.php?receiver_registration=true',
			type: 'post',
			dataType: 'json',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href =  './login');
				} else {
					swal.fire("Error", response.message, "Warning");
				}

			}
		})
	})

})