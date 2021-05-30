$(document).ready(function () {
	$('.hospitalLogout').on('submit', function (e) { 
		e.preventDefault();
		alert("clicked");
		var formdata = new FormData(this);
		formdata.append('hospitalLogin', 'true');
		$.ajax({
			url: 'index.php?logout=true',
			type: 'post',
			dataType: 'json',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href ="" );

				} else {
					swal.fire("Error", response.message, "Warning").then(() => location.reload());
				}

			}
		})
	})

	$('.receiverLogout').on('submit', function (e) { 
		e.preventDefault();
		alert("clicked");
		var formdata = new FormData(this);
		formdata.append('hospitalLogin', 'true');
		$.ajax({
			url: 'index.php?logout=true',
			type: 'post',
			dataType: 'json',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href ="" );

				} else {
					swal.fire("Error", response.message, "Warning").then(() => location.reload());
				}

			}
		})
	})
});