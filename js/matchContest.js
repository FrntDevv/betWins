$(document).ready(function () {


	$('.hideShowBlock1').on('click', function(){
		$('.block1').slideToggle();
		$('.block2').slideUp();
		$('.block3').slideUp();
		$('.block4').slideUp();
		$('.block5').slideUp();
		$('.block6').slideUp();
	});
	$('.hideShowBlock2').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideToggle();
		$('.block3').slideUp();
		$('.block4').slideUp();
		$('.block5').slideUp();
		$('.block6').slideUp();
	});
	$('.hideShowBlock3').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideUp();
		$('.block3').slideToggle();
		$('.block4').slideUp();
		$('.block5').slideUp();
		$('.block6').slideUp();
	});
	$('.hideShowBlock4').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideUp();
		$('.block3').slideUp();
		$('.block4').slideToggle();
		$('.block5').slideUp();
		$('.block6').slideUp();
	});
	$('.hideShowBlock5').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideUp();
		$('.block3').slideUp();
		$('.block4').slideUp();
		$('.block5').slideToggle();
		$('.block6').slideUp();
	});
	$('.hideShowBlock6').on('click', function(){
		$('.block1').slideUp();
		$('.block2').slideUp();
		$('.block3').slideUp();
		$('.block4').slideUp();
		$('.block5').slideUp();
		$('.block6').slideToggle();
	});


	$('.team1List').on('click',function(){
		$('.team1List').removeClass('activeEventOption');
		var contestId1  = $(this).attr('contest-id');
		
		var contestId2 = $('.activeEventOption2').attr('contest-id');
		
		if (contestId2) {
			if(contestId2!=contestId1){
				alert('Player should be from same contest');
				return;
			}
		}
		
		if(contestId2==1||contestId2==2||contestId2==3){
			$('.team2List').removeClass('activeEventOption');
		}
		var bettingRate = $(this).attr('betting-rate');
		$(this).toggleClass('activeEventOption');
	})
	$('.team2List').on('click',function(){
		var contestText = $(this).attr('contest-name');
		var contestID 	= $(this).attr('contest-id');
		if (contestID==5||contestID==6) {
			var contestId1  = $('.activeEventOption').attr('contest-id');
			if(!contestId1){
				alert("Select player from first team");
				return;
			}
			if (contestId1!=contestID) {
				alert("Player should be from same contest");
				return;
			}
			$('.team2List').removeClass('activeEventOption2');
			var bidBox = $('.bidBoxMatch').show();
			var playerNameFirst = $('.activeEventOption').text();
			var playerNameSecond = $(this).text();
			var player1teamId = $('.activeEventOption').attr('team-id');
			var player2teamId = $(this).attr('team-id');
			var playerId2     = $(this).attr('id');
			var playerId1 	  = $('.activeEventOption').attr('id');
			$('.contestText').html(playerNameFirst);
			$('.contestText2').html(playerNameSecond);
			$('.bidAmount').attr('contest-id',contestID);
			$('.bidAmount').attr('player-id1',playerId1);
			$('.bidAmount').attr('player-id2',playerId2);
			$('.bidAmount').attr('playerTeamid1',player1teamId);
			$('.bidAmount').attr('playerTeamid2',player2teamId);

		}else{
			var bidBox = $('.bidBoxMatch').show();
			$('.team1List').removeClass('activeEventOption');
			var playerNameFirst = $(this).text();
			var selected_id     = $(this).attr('id');
			$('.bidAmount').attr('contest-id',contestID);
			$('.bidAmount').attr('team-id',selected_id);
			$('.contestText').html(playerNameFirst);
		}
		var bettingRate = $(this).attr('betting-rate');
		$(this).toggleClass('activeEventOption2');
		
		$('.selectedContestName').html(contestText);
		$('.multiplierValue').html(bettingRate);
		
	})

	$('.bidAmount').on('input',function(){
		var amount = $(this).val();
		var multiplier = $('.multiplierValue').html();
		var returnAmount = amount*multiplier;
		$('.returnAmount').html(returnAmount);
		console.log(returnAmount);
	});
	$('.placeMatchBid').on('click', function (e) { 

		var contest_id   =	$('.bidAmount').attr('contest-id');
		var match_id 	 = 1;
		if (contest_id==1||
			contest_id==2||
			contest_id==3||
			contest_id==4) {
			var teamId = $(this).attr('team-id');
			var bidAmount =	$(this).val();
		}else{
			 var player1_id =	$('.bidAmount').attr('player-id2');
			 var player1_teamId =	$('.bidAmount').attr('playerteamid1');
			 var player2_id =	$('.bidAmount').attr('player-id2');
			 var player2_teamId =	$('.bidAmount').attr('playerteamid2');
			 var bidAmount =	$('.bidAmount').val();
		}

			e.preventDefault();
			$.ajax({
				url: 'index.php?match-id=true',
				type: 'post',
				dataType: 'json',
				data: {
					'placeBidMatchContest':'true',
					'player1_id':player1_id,
					'player1_teamId':player1_teamId,
					'player2_id':player2_id,
					'player2_teamId':player2_teamId,
					'teamId':teamId,
					'contest_id':contest_id,
					'match_id':match_id,
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
	})
});