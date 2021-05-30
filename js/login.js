$(document).ready(function () {
	$('.usrlgbtn').click(function () {
		$('.userLoginSection').show();
		$('.receiverLoginSection').hide();
		$(this).addClass('active');
		$('.reslgbtn').removeClass('active');
	});

	$('.reslgbtn').click(function () {
		$('.receiverLoginSection').show();
		$('.userLoginSection').hide();
		$(this).addClass('active');
		$('.usrlgbtn').removeClass('active');
	});




	$('#receiverLogin').on('submit', function (e) {
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append('receiverLogin', 'true');
		$.ajax({
			url: 'index.php?receiverLogin=true',
			type: 'post',
			dataType: 'json',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				if (response.success === 'true') {
					swal.fire("Success", response.message, "success").then(() => window.location.href = "./dashboard");
				} else {
					swal.fire("Error", response.message, "Warning").then(() => location.reload());
				}

			}
		})
	})


});