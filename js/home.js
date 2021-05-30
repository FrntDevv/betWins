$(document).ready(function () {

	$('.hideShowBlock1').on('click', function(){
		$('.block1').slideToggle();
		$('.block2').slideUp();
		$('.block3').slideUp();
		$('.block4').slideUp();
		$('.block5').slideUp();
	});
	$('.hideShowBlock2').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideToggle();
		$('.block3').slideUp();
		$('.block4').slideUp();
		$('.block5').slideUp();
	});
	$('.hideShowBlock3').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideUp();
		$('.block3').slideToggle();
		$('.block4').slideUp();
		$('.block5').slideUp();
	});
	$('.hideShowBlock4').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideUp();
		$('.block3').slideUp();
		$('.block4').slideToggle();
		$('.block5').slideUp();
	});
	$('.hideShowBlock5').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideUp();
		$('.block3').slideUp();
		$('.block4').slideUp();
		$('.block5').slideToggle();
	});
	
	$('.eventOption').on('click', function(){
		if ($(this).hasClass('activeEventOption')) {
			$(this).removeClass('activeEventOption');
		}else{
			$('.eventOption').removeClass('activeEventOption');
			$(this).toggleClass('activeEventOption');
		}
		var contestText = $(this).attr('contest-name');
		var contestID 	= $(this).attr('contest-id');
		var playerName = $(this).attr('player-name');
		var selected_id = $(this).attr('id');
		var bettingRate = $(this).attr('betting-rate');
		
		var bidBox = $('.bidBox');
		if ($('.eventOption').hasClass('activeEventOption')) {
			$('.bidBox').show();
		}else{
			$('.bidBox').hide();
		}
		
		$('.selectedContestName').html(contestText);
		$('.contestText').html(playerName);
		$('.multiplierValue').html(bettingRate);
		$('.bidAmount').attr('contest-id',contestID);
		$('.bidAmount').attr('selected-id',selected_id);
	});

	$('.placeTournamentBid').on('click', function(e){
	   e.preventDefault();
	   var contestId = $('.bidAmount').attr('contest-id');

	   if (contestId==14||contestId==15) {
	   		var playerId = $('.bidAmount').attr('selected-id');
	   }else{
	   		var teamId = $('.bidAmount').attr('selected-id');
	   }
	   var bidAmount = $('.bidAmount').val();
	   $.ajax({
	       url:'index.php?home=true',
	       type:'post',
	       dataType:'json',
	       data:{
	           'placeTournamentBet':true,
	           'contestId':contestId,
	           'teamId':teamId,
	           'playerId':playerId,
	           'bidAmount':bidAmount
	       },
	       success:function(response){
	        if(response.success=='true'){
	            //window.location.reload();
	        }else{
	           alert(response.message);
	           //window.location.reload();
	        } 
	       }
	   })
	})
	$('.placeTournamentBidd').on('click', function (e) { 
		var contest_id   =	11;
		if (contest_id==11||
			contest_id==12||
			contest_id==13
			) {
			var teamId = 1;
			var bidAmount =	500;
		}else{
			var playerId =	1;
			var bidAmount =	500;
		}
			if (contest_id) {
			e.preventDefault();
			$.ajax({
				url: 'index.php?home=true',
				type: 'post',
				dataType: 'json',
				data: {
					'placeTournamentBet':'true',
					'contestId':contest_id,
					'teamId':teamId,
					'playerId':playerId,
					'bidAmount':bidAmount
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
				alert("Please select any one contest to place a bet");
			}
		
	});


	$('.bidAmount').on('input',function(){
		var amount = $(this).val();
		var multiplier = $('.multiplierValue').html();
		var returnAmount = amount*multiplier+' INR';
		$('.returnAmount').html(returnAmount);
		console.log(returnAmount);
	});
});