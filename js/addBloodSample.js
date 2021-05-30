$(document).ready(function () {

	$('#addBloodInfoForm').on('submit', function (e) {
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append('addBloodInfo', 'true');
		$.ajax({
			url: 'index.php?addBloodInfo=true',
			type: 'post',
			dataType: 'json',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href ="./addBloodInfo" );

				} else {
					swal.fire("Error", response.message, "Warning").then(() => location.reload());
				}

			}
		})
	})


});