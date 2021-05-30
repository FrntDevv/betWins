$(document).ready(function () {

	$('.hospitalSelect').on('click', function(){
		$('.hospitalSelect').removeClass('active');
		$(this).addClass('active');
	});
	$('.hideShowBlock1').on('click', function(){
		$('.block1').toggle();
	});
	$('.playerName').on('click', function(){
		$('.selectedPlayer').removeClass('checkedMark');
		$(this).find('.selectedPlayer').show().toggleClass('checkedMark');
	});

	$('.addMoney').on('click', function(e){
	   e.preventDefault();
	   var amount = $('.depositAmount').val();
	   $.ajax({
	       url:'index.php?add-money=true',
	       type:'post',
	       dataType:'json',
	       data:{
	           'startPayment':true,
	           'amount':amount
	       },
	       success:function(response){
	        if(response.success=='true'){
	            window.location.reload();
	        }else{
	           alert(response.message);
	           window.location.reload();
	        }
	         
	           
	           
	           
	       }
	   })
	})

	$('.requestSample').on('click', function (e) { 
		var user_id 	= 	$(this).attr('user-id');
		var sample_id   =	$(this).attr('sample-id');
		var hospital_id =	$('.active').attr('hospital-id');
		if (user_id) {
			if (hospital_id) {
			e.preventDefault();
			$.ajax({
				url: 'index.php?requestSample=true',
				type: 'post',
				dataType: 'json',
				data: {
					'requestSample':'true',
					'user_id' : user_id,
					'sample_id':sample_id,
					'hospital_id':hospital_id
				},
				success: function (response) {
					if (response.success === 'true') {
						swal.fire("Success", response.message, "success").then(() => window.location.href ="" );

					} else {
						swal.fire("Error", response.message, "Warning").then(() => location.reload());
					}

				}
			})
			}else{
				alert("Please select any one hospital to request blood sample");
			}
		}else{
			alert("Log in first as a receiver");
		}
		
	})
});